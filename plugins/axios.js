export default function ({ $axios, store }) {
    $axios.onError((error) => {
        console.log("having error...");
        if (error.response.status == 422) {
            console.log(error.response.status);
            console.log(error.response.data.errors);
            store.commit("errors/errors", error.response.data.errors);
        }
    });

    /*
    $axios.onRequest((config) => {
    });
    */
}
