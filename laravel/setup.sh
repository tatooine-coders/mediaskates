#!/bin/bash -
#title          :setup.sh
#description    :Downloads extra plugins not available with Composer
#                (Forked from Elabs installer)
#author         :Manuel Tancoigne
#date           :20160808
#version        :1
#usage          :./setup.sh
#notes          :
#bash_version   :4.3.30(1)-release
#============================================================================
# Some fancy stuff
EL_BOX_SHADOW_LIGHT="\xE2\x96\x91";
EL_BOX_SHADOW_DARK="\xE2\x96\x93";
EL_BOX_TOP_LINE="  ${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}${EL_BOX_SHADOW_LIGHT}";

export EL_BOX_SHADOW_LIGHT;
export EL_BOX_SHADOW_DARK;
export EL_BOX_TOP_LINE;

# Get the absolute path to current dir:
pushd `dirname .` > /dev/null;
MS_DIR=`pwd`;
popd > /dev/null;

# Make MS_DIR available in other scripts
export MS_DIR

echo ""
echo -e "${EL_BOX_TOP_LINE}";
echo -e "+-------------------------------------------------------------------+${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "|  \e[33mMediaSkate Installer\e[39m                                             |${EL_BOX_SHADOW_LIGHT}"
echo -e "|  \e[33m====================\e[39m                                             |${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "+- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -+${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "| \e[33mYou should launch this script from your dev env. If it's not the \e[39m |${EL_BOX_SHADOW_LIGHT}"
echo -e "| \e[33mcase, hit [Ctrl]+[c] to exit.\e[39m                                     |${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "| \e[34mNow, the installer will download some js and css files.\e[39m           |${EL_BOX_SHADOW_LIGHT}"
echo -e "| -------------------------------------------------------           |${EL_BOX_SHADOW_LIGHT}"
# Css/JS sources
_sources/setup_sources.sh $1;

echo "";
echo -e "${EL_BOX_TOP_LINE}";
echo -e "+-------------------------------------------------------------------+${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "| \e[34mInstalling dependencies...\e[39m                                        |${EL_BOX_SHADOW_LIGHT}"
echo -e "| \e[34m--------------------------\e[39m                                        |${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "+-------------------------------------------------------------------+";
echo "";

cd $MS_DIR;

# Install dev ?
read -p "Do you want to install the development dependencies ? [Y/n]" INSTALLDEV;

while [[ ! "$INSTALLDEV" =~ ^(y|Y|n|N|)$ ]]; do
    read -p " > Please, choose 'y' or 'n' or nothing to use defaults." INSTALLDEV;
done;

case $INSTALLDEV in
    [yY]) INSTALLDEV='y';;
    [nN]) INSTALLDEV='n';;
    '') INSTALLDEV='y';;
esac;

if [ 'y' == "$INSTALLDEV" ]; then
    composer install;
elif [ 'n' == "$INSTALLDEV" ]; then
    composer install --no-dev;
fi;

echo "";
echo -e "${EL_BOX_TOP_LINE}";
echo -e "+-------------------------------------------------------------------+${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "| \e[34mTake some time to set up your application\e[39m                         |${EL_BOX_SHADOW_LIGHT}"
echo -e "| \e[34m-----------------------------------------\e[39m                         |${EL_BOX_SHADOW_LIGHT}"
echo -e "| The next step will be the database setup.                         |${EL_BOX_SHADOW_LIGHT}"
echo -e "|   - Edit the '.env' file and enter the proper database config     |${EL_BOX_SHADOW_LIGHT}"
echo -e "|     values.                                                       |${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
#if [ 'n' == "$INSTALLDEV" ]; then
#    echo -e "| As you don't have installed the development dependencies, you     |${EL_BOX_SHADOW_LIGHT}";
#    echo -e "| should set 'debug' to false in config/app.php                 |${EL_BOX_SHADOW_LIGHT}";
#    echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
#fi;
echo -e "| Hit RETURN when you are done with edition and ready to continue.  |${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "+-------------------------------------------------------------------+";
read OK;

echo -e "${EL_BOX_TOP_LINE}";
echo -e "+-------------------------------------------------------------------+${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "| \e[34mPopulating database...\e[39m                                            |${EL_BOX_SHADOW_LIGHT}"
echo -e "| \e[34m----------------------\e[39m                                            |${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "+-------------------------------------------------------------------+";
echo ""
php artisan migrate --seed

echo ""
echo -e "${EL_BOX_TOP_LINE}";
echo -e "+-------------------------------------------------------------------+${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "| \e[34mSetup is over.\e[39m                                                    |${EL_BOX_SHADOW_LIGHT}"
echo -e "| \e[34m--------------\e[39m                                                    |${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "|   You can now log in using the following credentials:             |${EL_BOX_SHADOW_LIGHT}"
echo -e "|     - email: admin@example.com                                    |${EL_BOX_SHADOW_LIGHT}"
echo -e "|     - password: password                                          |${EL_BOX_SHADOW_LIGHT}"
echo -e "|                                                                   |${EL_BOX_SHADOW_LIGHT}"
echo -e "+-------------------------------------------------------------------+";
