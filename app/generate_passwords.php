<?php

echo "ADMIN password hash:\n";
echo password_hash('Admin123!', PASSWORD_DEFAULT);

echo "\n\nUSER password hash:\n";
echo password_hash('User123!', PASSWORD_DEFAULT);