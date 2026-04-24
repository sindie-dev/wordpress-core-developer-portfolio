// Example REST API fetch helper

async function fetchPortfolioData() {
    const response = await fetch( '/wp-json/wp/v2/posts' );
    if ( ! response.ok ) {
        throw new Error( 'Network response was not ok' );
    }
    return response.json();
}

export default fetchPortfolioData;
