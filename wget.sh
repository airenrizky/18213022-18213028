#!/bin/sh
wget -nd -r -l 1 -P airen2 -A jpg http://www.itb.ac.id/news/4936.xhtml
rsync -a airen2 hana2
