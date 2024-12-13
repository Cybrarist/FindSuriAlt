# Use the base image provided in your original Dockerfile
FROM dunglas/frankenphp:1.2.5-php8.3.13-bookworm

LABEL authors="Cybrarist"

# Set environment variables
ENV SERVER_NAME=":80"
ENV FRANKENPHP_CONFIG="worker /app/public/index.php"
ENV FRANKEN_HOST="localhost"

# Install system dependencies including Python 3, pip, and libraries needed for deepfake processing
RUN apt update && apt install -y \
        supervisor \
        libmcrypt-dev \
        libbz2-dev \
        libzip-dev \
        libpng-dev \
        libicu-dev \
        python3 \
        python3-pip \
        python3-venv \
        python3-dev \
        ffmpeg \
        libsm6 \
        libxext6 \
        libxrender1 \
        && apt-get clean

RUN install-php-extensions \
	pdo_mysql \
	gd \
	intl \
    pcntl \
	zip \
	opcache

# Copy the rest of the application files into the container
COPY . /app

RUN python3 -m venv /app/face_recognition/

EXPOSE 80 443 2019 8080

COPY ./docker/base_supervisord.conf /etc/supervisor/conf.d/supervisord.conf


RUN chmod +x ./docker/entrypoint.sh

WORKDIR /app

ENTRYPOINT ["docker/entrypoint.sh"]
