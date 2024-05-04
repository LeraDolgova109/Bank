export async function retryOperation(query)
{
    let currentTry = 0;

    while(true)
    {
        try {
            query();

            break;
        } catch (error) {
            currentTry++;

            if(currentTry > 7)
            {
                currentTry = 0;
                alert('Internal Server Error');
                await sleep(5000);
                retryOperation(query);
            }
        }
    }  
}     

async function sleep(ms)
{
    return new Promise(resolve => {
        setTimeout(() => {
            resolve()
        }, ms);
    });
}
