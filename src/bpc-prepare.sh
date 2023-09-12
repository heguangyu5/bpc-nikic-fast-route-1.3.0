#!/bin/bash

[[ "$1" == "" ]] && {
    echo "Usage: ./bpc-prepare.sh src.list"
    exit
}

rm -rf ./FastRoute
rsync -a                        \
      --exclude=".*"            \
      -f"+ */"                  \
      -f"- *"                   \
      ./                        \
      ./FastRoute
for i in `cat $1`
do
    if [[ "$i" == \#* ]]
    then
        echo $i
    else
        filename=`basename -- $i`
        if [ "${filename##*.}" == "php" ]
        then
            echo "phptobpc $i"
            phptobpc $i > ./FastRoute/$i
        else
            echo "cp       $i"
            cp $i ./FastRoute/$i
        fi
    fi
done
cp bpc.conf $1 Makefile ./FastRoute/
