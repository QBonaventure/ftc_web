#!/bin/sh

USER_ID=${LOCAL_USER_ID:-9001}

echo "Starting with UID : $USER_ID"


openssl genrsa -des3 -passout pass:password -out /etc/nginx/ssl/ssl.key 2048 -noout
openssl rsa -in /etc/nginx/ssl/ssl.key -passin pass:password -out /etc/nginx/ssl/ssl/ssl.key
openssl req -new -key /etc/nginx/ssl/ssl.key -out /etc/nginx/ssl/ssl.csr -passin pass:password \
    -subj "/C=$CERTS_COUNTRY/ST=state/L=$CERTS_LOCALITY/O=$CERTS_ORGANIZATION/OU=organizationalunit/CN=commonname/emailAddress=$CERTS_EMAIL_ADDRESS"

exec "$@"
