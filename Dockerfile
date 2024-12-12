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

# Copy the .env.example file as .env
COPY .env.example /app/.env

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

# Set the virtual environment path to be used in runtime
ENV PATH="/opt/venv/bin:$PATH"
