#!/bin/bash

# URL to send requests to
url=$1

# Array to hold all response times
declare -a response_times

# Total time initialized to 0
total_time=0

for i in {1..10}; do
    # Perform curl request and capture time in milliseconds
    response_time=$(curl -o /dev/null -s -w '%{time_total}\n' $url)

    # Convert to milliseconds and print
    response_time_ms=$(awk "BEGIN {print $response_time * 1000}")
    echo "Request $i: $response_time_ms ms"

    # Add to array
    response_times+=($response_time_ms)

    # Add to total time
    total_time=$(awk "BEGIN {print $total_time + $response_time_ms}")
done

# Calculate average response time
average_time=$(awk "BEGIN {print $total_time / 10}")
echo "Average Response Time: $average_time ms"
