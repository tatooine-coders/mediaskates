#!/bin/bash -
#title          :setup_sources.sh
#description    :Downloads all files required to build CSS/JS
#author         :Manuel Tancoigne
#date           :20161003
#version        :0.1
#usage          :./setup.sh
#notes          :
#bash_version   :4.3.46(1)-release
#============================================================================


RESSOURCES=$MS_DIR"/public/";
SASS_LIBS_DIR=$MS_DIR"/_sources/common"

function remove_sources(){
    echo -e "...Removing downloaded sources\n";
    rm -rf "$SASS_LIBS_DIR";
		mkdir "$SASS_LIBS_DIR";
}

echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}";
echo -e "| \e[34mNotes about the sources\e[39m                                           |${EL_BOX_SHADOW_LIGHT}";
echo -e "| \e[34m-----------------------\e[39m                                           |${EL_BOX_SHADOW_LIGHT}";
echo -e "| The installer is going to download some packages to take some js  |${EL_BOX_SHADOW_LIGHT}";
echo -e "| files in them. Those packages are also used to generate the       |${EL_BOX_SHADOW_LIGHT}";
echo -e "| custom css files. You can keep these sources if you plan to       |${EL_BOX_SHADOW_LIGHT}";
echo -e "| change the styles of the app by yourself.                         |${EL_BOX_SHADOW_LIGHT}";
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}";
echo -e "| \e[34mNotes about this installer\e[39m                                        |${EL_BOX_SHADOW_LIGHT}";
echo -e "| \e[34m--------------------------\e[39m                                        |${EL_BOX_SHADOW_LIGHT}";
echo -e "| If you don't run this tool for the first time, please MANUALLY    |${EL_BOX_SHADOW_LIGHT}";
echo -e "| REMOVE THE EXISTING DIRECTORIES FROM common/.                     |${EL_BOX_SHADOW_LIGHT}";
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}";
echo -e "+-------------------------------------------------------------------+";
echo '';

# Keep the sources ?
read -p "Do you want to keep the sources needed to build the css ? [Y/n]" KEEPSOURCES;

while [[ ! "$KEEPSOURCES" =~ ^(y|Y|n|N|)$ ]]; do
    read -p " > Please, choose 'y' or 'n' or nothing to use defaults." KEEPSOURCES;
done;

case $KEEPSOURCES in
    [yY]) KEEPSOURCES='y';;
    [nN]) KEEPSOURCES='n';;
    '') KEEPSOURCES='y';;
esac;
echo "";

# Check arguments
scriptOption='';
if [ "$1" == "update" ]; then
    remove_sources;
else
    mkdir "$SASS_LIBS_DIR";
fi;

cd $SASS_LIBS_DIR;

echo -e "\e[34m Downloading...\e[39m";
echo -e "\e[34m --------------\e[39m";

# KNACSS
# ======
echo " > Getting latest KNACSS files";
wget -q "https://github.com/alsacreations/KNACSS/archive/6.0.0.tar.gz"
tar zxf "6.0.0.tar.gz"
mv "KNACSS-6.0.0" "knacss"
rm -f "6.0.0.tar.gz"

# FontAwesome
# ===========
echo " > Getting latest FontAwesome files";
wget -q "https://github.com/FortAwesome/Font-Awesome/archive/master.tar.gz"
tar zxf "master.tar.gz"
rm -f "master.tar.gz"
# Needed files
cp -f Font-Awesome-master/fonts/ "$RESSOURCES/fonts/"

# jQuery
# ======
echo " > Getting latest jQuery script";
wget -q "http://code.jquery.com/jquery-1.11.3.min.js" -O "$RESSOURCES/js/vendor/jquery.min.js"

# Remove the sources
# ==================
if [ 'n' == $KEEPSOURCES ]; then
    remove_sources;
fi;

echo -e "";
echo -e "\e[34mDone.\e[39m";
echo -e "";
