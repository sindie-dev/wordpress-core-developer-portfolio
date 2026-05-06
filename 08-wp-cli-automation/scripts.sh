#Essentials CLI Script
----------------------------------
#!/bin/bash

# Install essential plugins
PLUGINS=(
  "advanced-custom-fields"
  "elementor"
  "wpforms-lite"
  "rank-math"
  "wp-super-cache"
  "wordfence"
)

for PLUGIN in "${PLUGINS[@]}"; do
  wp plugin install "$PLUGIN" --activate --allow-root
done

echo "All essential plugins installed and activated!"

###########################################################################################################################################

#Delete all inactive themes:
wp theme delete $(wp theme list --status=inactive --field=name)
