



/////////////////////////////////////////////////////


    function show_details(option)
    {
        
        switch (option) {
            case 0:
                document.getElementById('show_more_details').style.display = 'flex';
                break;
            case 1:
                document.getElementById('show_more_details_completiontime').style.display = 'flex';
                break;
            case 2:
                document.getElementById('show_more_detail_collabortors').style.display = 'flex';
                break;
            case 4:
                document.getElementById('show_more_details_research_type').style.display = 'flex';
                break;



        }


    }

function go_back(option) {
    console.log("haii");

    switch (option) {
        case 0:
            document.getElementById('show_more_details').style.display = 'none';
            break;
        case 1:
            document.getElementById('show_more_details_completiontime').style.display = 'none';
            break;
        case 2:
            document.getElementById('show_more_detail_collabortors').style.display = 'none';
            break;
        // case 4:
        //     console.log("haii");
        //     document.getElementById('show_more_details_research_type').style.display = 'none';
        //     break;


    }
}








//////////////////////////////////////////////////database part/////////////////////////////////////////////////////


