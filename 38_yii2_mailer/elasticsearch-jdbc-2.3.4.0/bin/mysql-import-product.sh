#!/bin/sh

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
bin=${DIR}/../bin
lib=${DIR}/../lib

echo '
{
    "type" : "jdbc",
    "jdbc" : {
        "url" : "jdbc:mysql://localhost:3306/imooc_shop",
        "user" : "root",
        "password" : "root123",
        "sql" : "select title, descr, productid, productid as _id from shop_product",
        "index" : "imooc_shop",
        "type" : "products",
        "elasticsearch" : {
             "cluster" : "yii2-search",
             "host" : "192.168.199.112",
             "port" : 9300
        }   
    }
}
' | java \
    -cp "${lib}/*" \
    -Dlog4j.configurationFile=${bin}/log4j2.xml \
    org.xbib.tools.Runner \
    org.xbib.tools.JDBCImporter
