#!/bin/sh
find /var/log/httpd/*log -mtime +10 -exec rm -f {} \;