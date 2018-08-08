$(document).ready(function(){
    
    var score = "";
    $("form").submit(function(event) {
        
        event.preventDefault();
        
        //Get answers
        var answer1 = $("input[name='question1']:selected").val();
        
        //console.log(answer1);
        
        //Checks if answers are correct
        // Question 1
        if(answer1 === $random) {
            correctAnswer($("#question1-feedback"));
        } else {
            incorrectAnswer($("#question1-feedback"));
        }
        
        $("#question1-feedback").append("The answer is $random" );

        //Displays quiz score
        $("#score").html( score );
        $("#waiting").html("<img src='img/loading.gif' alt='submitting data' />");
        $("input[type='submit']").css("display", "none");

        //Submits and stores score, retrieves average score
        $.ajax({
            type : "post",
            url  : "submitScores2.php",            
            dataType : "json",
            data : {"score" : score},            
            success : function(data){
                console.log(data);
                $("#feedback").css("display","block");
                $("#waiting").html("");
                $("input[type='submit']").css("display","");
            },
            complete: function(data,status) { //optional, used for debugging purposes
               // alert(status);
            }

        });//AJAX
        
    }); //formSubmit
    
    //Styles a question as answered correctly
    function correctAnswer(questionFeedback){
        questionFeedback.html("Correct! ");
        questionFeedback.addClass("correct");
        questionFeedback.removeClass("incorrect");
        score = "Correct";
    }

    //Styles a question as answered incorrectly
    function incorrectAnswer(questionFeedback){
        questionFeedback.html("Incorrect! ");
        questionFeedback.addClass("incorrect");
        questionFeedback.removeClass("correct");
        score ="Incorrect"
    }
    
    
}); //documentReady   
