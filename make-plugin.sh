#!/bin/sh
#
# invoke in the top-level directory of the plugin with ./make-plugin.sh.
#
# it will build a ZIP file named for the current directory. Note that it will only include stuff *committed to master*, 
# any local uncommitted changes will be ignored.

name=${PWD##*/}
git archive --format=zip --prefix=$name/ master > $name.zip
