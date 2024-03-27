const apikey = "0b624e776eec5e2323f797bdfcd870f1";
const apiurl = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=";

const searchBox = document.querySelector(".search input")
const searchButton = document.querySelector(".search button")
// const weatherIcon = document.querySelector(".weather-icon");

async function checkWeather(city){
    const response = await fetch(apiurl + city + `&appid=${apikey}`);

    if (response.status == 404){
        document.querySelector(".weather").style.display = "none";
        document.querySelector(".error").style.display = "block";

    }else {
        var data = await response.json();

        var back_src = null

        if (data.weather[0].main == "Clouds"){
            back_src = "images/clouds.png";
        }
        else if (data.weather[0].main == "Clear"){
            back_src = "images/clear.png";
        }
        else if (data.weather[0].main == "Rain"){
            back_src = "images/rain.png";
        }
        else if (data.weather[0].main == "Drizzle"){
            back_src = "images/drizzle.png";
        }
        else if (data.weather[0].main == "Mist"){
            back_src = "images/mist.png";
        }
        else if (data.weather[0].main == "Snow"){
            back_src = "images/snow.png";
        }

        window.location.href=`saveData.php?city=${data.name}&temp=${Math.round(data.main.temp)}&pressure=${data.main.pressure}&wind=${data.wind.speed}&back_src=${back_src}`

        // document.querySelector(".weather").style.display = "block";
        document.querySelector(".error").style.display = "none";

    }

}
searchButton.addEventListener("click", ()=>{
    checkWeather(searchBox.value);
})


