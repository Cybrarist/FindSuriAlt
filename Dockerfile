# Use the base image provided in your original Dockerfile
FROM dunglas/frankenphp:1.2.5-php8.3.13-bookworm

LABEL authors="Cybrarist"

# Set environment variables
ENV SERVER_NAME=":80"
ENV FRANKENPHP_CONFIG="worker /app/public/index.php"
ENV FRANKEN_HOST="localhost"

# Install system dependencies including Python 3, pipx, and libraries needed for deepfake processing
RUN apt update && apt install -y \
        supervisor \
        libmcrypt-dev \
        libbz2-dev \
        libzip-dev \
        libpng-dev \
        libicu-dev \
        python3 \
        python3-pip \
        python3-dev \
        build-essential \
        ffmpeg \
        libsm6 \
        libxext6 \
        libxrender1 \
        pipx \
    && apt-get clean

# Use pipx to install Python libraries for Deepfake and related tasks
RUN pipx install deepface \
    && pipx install tensorflow \
    && pipx install opencv-python-headless \
    && pipx install numpy

# Install PHP extensions
RUN docker-php-ext-install \
        pcntl \
        opcache \
        pdo_mysql \
        pdo \
        bz2 \
        intl \
        bcmath \
        zip

# Copy supervisor config file to the container
COPY ./docker/base_supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy the rest of the application files into the container
COPY . /app

# Set working directory inside the container
WORKDIR /app

# Expose the ports the app will use
EXPOSE 80 443 2019 8080

# Make the entrypoint script executable
RUN chmod +x /app/*

# Set the entrypoint to your custom script
ENTRYPOINT ["docker/entrypoint.sh"]
