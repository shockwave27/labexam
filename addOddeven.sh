#!/bin/bash

# Function to calculate the sum of even digits
calculate_even_sum() {
    num=$1
    sum=0

    while [ $num -gt 0 ]; do
        digit=$((num % 10))
        if [ $((digit % 2)) -eq 0 ]; then
            sum=$((sum + digit))
        fi
        num=$((num / 10))
    done

    echo "Sum of even digits: $sum"
}

# Function to calculate the average of odd digits
calculate_odd_avg() {
    num=$1
    count=0
    sum=0

    while [ $num -gt 0 ]; do
        digit=$((num % 10))
        if [ $((digit % 2)) -ne 0 ]; then
            sum=$((sum + digit))
            count=$((count + 1))
        fi
        num=$((num / 10))
    done

    if [ $count -eq 0 ]; then
        echo "No odd digits found."
    else
        average=$(echo "scale=2; $sum / $count" | bc)
        echo "Average of odd digits: $average"
    fi
}

# Read the number from the user
read -p "Enter a number: " number

# Call the functions to calculate even sum and odd average
calculate_even_sum $number
calculate_odd_avg $number
