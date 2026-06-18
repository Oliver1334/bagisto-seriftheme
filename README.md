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
 
4. Run the setup script to install Bagisto. The setup script should handle environment file creation:
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
 
- **Hardcoded homepage content** — Rather than relying on admin panel theme customisations which are stored in the database and wouldn't persist on clone, the homepage hero and product carousel are hardcoded directly in the blade template.
- **Tailwind CSS** — Rather than setting up a separate Vite build pipeline, the default Shop theme's compiled Tailwind bundle is reused. This covers all standard utility classes without additional build configuration.
- **Checkout in test mode** — The checkout uses Bagisto's built-in Cash on Delivery payment method, no payment gateway required.