FROM httpd:alpine
WORKDIR /web_app
COPY index.html /usr/local/apache2/htdocs/

