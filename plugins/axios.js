export default function({$axios, store}) {
    $axios.onError(error => {
        console.log("having error...")
        console.log(error.response.data)
        console.log(error.response.status)
    });

    $axios.onRequest(config => {
        console.log("requesting...");
    })
}