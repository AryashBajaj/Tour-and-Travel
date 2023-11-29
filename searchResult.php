<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .search-results {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .result-item {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }

        .result-item:hover {
            transform: scale(1.05);
        }

        .result-item img {
            width: 100%;
            height: auto;
            border-radius: 8px 8px 0 0;
        }

        .result-item p {
            padding: 10px;
            text-align: center;
        }

        /* Style for "Hotels in this area" link */
        .result-item a {
            display: block;
            text-align: center;
            padding: 10px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 0 0 8px 8px;
            transition: background-color 0.3s ease-in-out;
        }

        .result-item a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="search-results">
    </div>
        <script>
        function displayResults(res) {
            var resultsContainer = document.querySelector('.search-results');

            // Clear previous results
            resultsContainer.innerHTML = '';

            // Loop through each result
            res.forEach(function (result) {
                // Create a div to hold each result
                var resultDiv = document.createElement('div');
                resultDiv.classList.add('result-item');
                var image = document.createElement('img');
                image.src = result.ilink;
                image.alt = result.locationName;
                image.width = 400;
                image.height = 300;
                var wikipediaLink = document.createElement('a');
                wikipediaLink.href = result.wlink;
                wikipediaLink.target = '_blank';
                wikipediaLink.appendChild(image);
                var nameParagraph = document.createElement('p');
                nameParagraph.textContent = result.locationName;
                var featuresParagraph = document.createElement('p');
                featuresParagraph.textContent = "Features: "; // You can customize this part based on your data model
                if (result.beaches == 1) featuresParagraph.textContent += "Beaches ";
                if (result.mountains == 1) featuresParagraph.textContent += "Mountains ";
                if (result.grasslands == 1) featuresParagraph.textContent += "Grasslands ";
                if (result.pilgrimage == 1) featuresParagraph.textContent += "Pilgrimage ";
                var hotelsLink = document.createElement('a');
                var locationId = result.locationId;
                hotelsLink.href = 'hotels.php?lid=' + locationId;
                hotelsLink.textContent = 'Hotels in this area';
                resultDiv.appendChild(wikipediaLink);
                resultDiv.appendChild(nameParagraph);
                resultDiv.appendChild(featuresParagraph);
                resultDiv.appendChild(hotelsLink);

                // Append the result div to the results container
                resultsContainer.appendChild(resultDiv);
            });
        }

        var xml = new XMLHttpRequest();
        xml.open("GET", "search1.php", true);
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Hello");
                console.log(this.responseText);
                var res = JSON.parse(this.responseText);
                console.log(res);
                displayResults(res);
            }
        }
        xml.send();
    </script>
</body>
</html>