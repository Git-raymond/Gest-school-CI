<br>
<h2 class="text-center text-danger">NEWS</h2><br>

<div class="text-center">
    <button class="btn btn-primary" onclick='getnews()'>Afficher les News FR</button>

    <div id="zoneNews"></div>
</div>
<br><br>
<script>
    function getnews() {

        var url = 'https://newsapi.org/v2/top-headlines?' +
            'country=fr&' +
            'apiKey=51eb66749eb14892baace68894da6010';
        var req = new Request(url);
        fetch(req)
            .then(a => a.json())
            .then(function(response) {
                // console.log(response.json());
                for (var i = 0; i < response.articles.length; i++) {
                    document.getElementById("zoneNews").innerHTML += "<div class='container'><img style='float:left; width: 150px;'src='" + response.articles[i].urlToImage + "'><h1 class='mt-5'>" + response.articles[i].title + "</h1>" + response.articles[i].source.name + "<br>" + response.articles[i].description + "<a href='" + response.articles[i].url + "'target='_blank'>" + response.articles[i].url + "</a></div>";
                }
            })
    }
</script>
<br><br><br><br>