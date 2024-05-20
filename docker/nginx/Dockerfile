FROM nginx:1.18.0-alpine

ENV NGINX_VERSION 1.18.0

RUN apk add openssl \
    && openssl req \
        -newkey rsa:2048 \
        -x509 \
        -new \
        -nodes \
        -keyout /etc/ssl/private/server.key \
        -out /etc/ssl/certs/server.crt  \
        -subj /CN=test \
        -sha256  \
        -days 3650  \
        -addext "subjectAltName = DNS:localhost,IP:127.0.0.1" \
        -addext "extendedKeyUsage = serverAuth"
