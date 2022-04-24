#!/bin/bash
id
whoami

supercronic /cron > /dev/null 2>&1 &

supervisord -c /etc/supervisor/conf.d/supervisord.conf
