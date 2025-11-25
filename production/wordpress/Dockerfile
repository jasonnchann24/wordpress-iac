FROM wordpress:6.8.3

COPY config-extra.php /usr/src/wordpress/config-extra.php

COPY patch-wp-config.sh /usr/local/bin/patch-wp-config.sh
RUN chmod +x /usr/local/bin/patch-wp-config.sh

# Override the entrypoint to include patch logic
ENTRYPOINT ["sh", "-c", "/usr/local/bin/patch-wp-config.sh && exec docker-entrypoint.sh apache2-foreground"]
