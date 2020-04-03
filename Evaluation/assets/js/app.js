
  
  async function main() {    
    const news = await fetch(`https://newsapi.org/${news}?access_key=8e2009553de741e3a16e0ef379ee0726`)
    .then(result => result.json())
    .then(json => json.news)
     

     console.log(news);
     
     
}
main();