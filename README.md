# FindSuriAlt

**FindSuriAlt** is a web software  dedicated to locating and reporting missing Syrians. A user-friendly tool for communities, families, and organizations to report, track, and find missing persons.

## Features
- **Report Missing Individuals:** Submit details about missing persons, including name, age, last known location, and identifying characteristics.
- **Search Database:** Access a searchable registry of reported individuals with advanced filters (e.g., name, age, location, date).

## Installation
The dockerfile has everything required to deploy this project


**Docker instructions**:  
1. Clone the repository:
   ```bash
   git clone https://github.com/Cybrarist/FindSuriAlt
   ```

   ```bash
   cd FindSuriAlt
   ```

   ```bash
   docker build -t findsuriapp .
   ```

   ```bash
   docker run -p 80:80 -p 443:443 -p 2019:2019 -p 8080:8080 --name findsuricontainer findsuriapp
   ```

If you are planning on doing this without docker, please check Dockerfile for the required libraries

There's a lot to do and we need contributors, please do not feel shy to contribute, or suggest ideas. Start by forking the project and submitting pull requests  
