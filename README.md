# Serif Theme - Bagisto
 
A custom "Serif" theme built on top of the Bagisto ecommerce platform, containerised with Docker.

The docker-compose.yml sets up all the necessary services and mounts the workspace/ directory into the containers with all the necessary dependencies for Bagisto. This repository includes the following services:

- PHP-FPM
- Nginx
- MySQL
- Redis
- PHPMyAdmin
- Elasticsearch
- Kibana
- Mailpit
 

## Installation & Setup

### Prerequisites
 
- Docker and Docker Compose installed ([Docker install guide](https://docs.docker.com/install/))

### Steps
 
1. Clone this repository:
```bash
   git clone https://github.com/Oliver1334/bagisto-seriftheme.git
```
 
2. Navigate to the project directory:
```bash
   cd bagisto-seriftheme
```

3. Build and start the containers:
```bash
   docker-compose up
```
 
4. Run the setup script to install Bagisto .configs/.env is included in the repo pre-configured for docker services:
```bash
   sh setup.sh
```
 
5. Visit `http://localhost` for the storefront and `http://localhost/admin` for the admin panel.

## Admin Credentials
 
```
Email: admin@example.com
Password: admin123
```
 
## Activating the Serif Theme
 
1. Log into the admin panel at `http://localhost/admin`
2. Navigate to **Settings → Channels**
3. Edit the default Channel, under Design - Theme select **Serif Theme** and set it as active

## Theme Structure
 
The Serif theme lives at `workspace/bagisto/resources/themes/serif-theme/` registered in `workspace/bagisto/config/themes.php`.
 
Bagisto uses a fallback theme system, I have decided to override key pages of the default theme, extra components used in tandem with these pages are accessed by the fallback system, the custom theme is structured as follows:

```
resources/themes/serif-theme/
└── views/
    ├── home/
    │   └── index.blade.php        # Homepage with hero and product carousel
    ├── categories/
    │   └── view.blade.php         # Product listing page
    ├── products/
    │   └── view.blade.php         # Product detail page
    └── checkout/
        ├── cart/
        │   └── index.blade.php    # Cart page
        └── onepage/
            └── index.blade.php    # Checkout flow
```

## Assumptions & Decisions

- **Docker setup** — Chose to run Bagisto in Docker to learn how the relevant dependencies (PHP-FPM, Nginx, MySQL) work together in a containerised environment. Hit an issue early on with PHP-FPM not connecting to Nginx and had to debug by checking the Nginx logs, ultimately fixing it by changing the listen address to `0.0.0.0:9000`.

- **Theme structure** — Spent time understanding how Bagisto's custom theme file structure works before building it. Mirrored the default theme's directory structure so Bagisto's fallback system would correctly pick up the custom theme overrides.

- **Fallback system decisions** — Because of the fallback system I had to decide which parts of the theme to separate out for customisation. Went with the main ecommerce pages as well as a landing page and left things like the header, footer, side cart and layout components to fall back to the default.

- **Hardcoded homepage content** — Rather than relying on admin panel theme customisations which are stored in the database and wouldn't persist on clone, the homepage hero I hardcoded directly and utilised the bagisto shop components to add a carousel.

- **Going forward** — With more time I would look into further developing custom theme packages, which would allow adding custom Vue components and a full Tailwind CSS configuration rather than relying on the default theme's compiled bundle.
