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
        python3-venv \
        python3-pip \
        python3-dev \
        build-essential \
        ffmpeg \
        libsm6 \
        libxext6 \
        libxrender1 \
        && apt-get clean

# Create a Python virtual environment in the container
RUN python3 -m venv /opt/venv

# Activate the virtual environment and install required Python libraries
RUN /opt/venv/bin/pip install --upgrade pip \
    && /opt/venv/bin/pip install deepface \
    && /opt/venv/bin/pip install tensorflow \
    && /opt/venv/bin/pip install opencv-python-headless \
    && /opt/venv/bin/pip install numpy \
    && /opt/venv/bin/pip install python-dotenv

RUN install-php-extensions \
	pdo_mysql \
	gd \
	intl \
	zip \
	opcache

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN composer require laravel/octane
RUN composer install


ENV DB_CONNECTION=sqlite
ENV DEFAULT_USER=test
ENV DEFAULT_EMAIL=docker@test.com
ENV DEFAULT_PASSWORD=thisismypassword
ENV APPRISE_URL=""
ENV APP_TIMEZONE=UTC
ENV RSS_FEED=1
ENV TOP_NAVIGATION=0
ENV DISABLE_TOP_BAR=0
ENV BREADCRUMBS=1
ENV SPA=1
ENV DISABLE_AUTH=1
ENV THEME_COLOR=Stone
ENV APP_URL=http://localhost:8080
ENV ASSET_URL=http://localhost:8080

COPY .env.example /app/.env

# Copy the rest of the application files into the container
COPY . /app

EXPOSE 80 443 2019 8080

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
RUN chmod +x docker/entrypoint.sh
ENTRYPOINT ["docker/entrypoint.sh"]


# Set the virtual environment path to be used in runtime
ENV PATH="/opt/venv/bin:$PATH"
