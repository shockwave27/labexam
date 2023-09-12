#!/bin/bash

# Function to generate and print Fibonacci series up to a limit
generate_fibonacci() {
    limit=$1
    a=0
    b=1

    echo "Fibonacci series up to limit $limit:"
    
    while [ $a -le $limit ]; do
        echo -n "$a "
        temp=$((a + b))
        a=$b
        b=$temp
    done
    echo # Print a newline after the series
}

# Read the limit from the user
read -p "Enter the limit for Fibonacci series: " limit

# Call the function to generate and print Fibonacci series
generate_fibonacci $limit
