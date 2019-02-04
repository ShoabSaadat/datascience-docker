<<<<<<< HEAD
FROM nginx:latest

# Remove default configuration files
RUN rm /etc/nginx/conf.d/default.conf; exit 0

# Copy our custom config files to Nginx Contatiner
COPY nginx.conf /etc/nginx
COPY site.conf /etc/nginx/conf.d

COPY ./cmdfile .
=======
FROM nginx:latest

# Remove default configuration files
RUN rm /etc/nginx/conf.d/default.conf; exit 0

# Copy our custom config files to Nginx Contatiner
COPY nginx.conf /etc/nginx
COPY site.conf /etc/nginx/conf.d

COPY ./cmdfile .
>>>>>>> cde983b561d91e70784a96bfc73d0df3b24da976
RUN chmod +x ./cmdfile