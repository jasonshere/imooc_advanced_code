<?php
namespace app\models;

class Kafka
{
    public $broker_list = '192.168.199.150:9092';
    public $topic = "topic";
    public $partition = 0;
    //public $logFile = '@app/runtime/logs/kafka/info.log';

    protected $producer = null;
    protected $consumer = null;

    public function __construct()
    {
        if (empty($this->broker_list)) {
            throw new \yii\base\InvalidConfigException("broker not config");
        }
        $rk = new \RdKafka\Producer();
        if (empty($rk)) {
            throw new \yii\base\InvalidConfigException("producer error");
        }
        $rk->setLogLevel(LOG_DEBUG);
        if (!$rk->addBrokers($this->broker_list)) {
            throw new \yii\base\InvalidConfigException("producer error");
        }
        $this->producer = $rk;
    }

    public function send($messages = [])
    {
        $topic = $this->producer->newTopic($this->topic);
        return $topic->produce(RD_KAFKA_PARTITION_UA, $this->partition, json_encode($messages));
    }

    public function consumer($object, $callback)
    {
        $conf = new \RdKafka\Conf();
        $conf->set('group.id', 0);
        $conf->set('metadata.broker.list', $this->broker_list);

        $topicConf = new \RdKafka\TopicConf();
        $topicConf->set('auto.offset.reset', 'smallest');

        $conf->setDefaultTopicConf($topicConf);

        $consumer = new \RdKafka\KafkaConsumer($conf);
        
        $consumer->subscribe([$this->topic]);

        echo "waiting for messages.....\n";
        while(true) {
            $message = $consumer->consume(120*1000);
            switch ($message->err) {
                case RD_KAFKA_RESP_ERR_NO_ERROR:
                    echo "message payload....";
                    $object->$callback($message->payload);
                    break;
            }
            sleep(1);
        }




    }








}
