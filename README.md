# TO SETUP BACKEND - SEE BACKEND DOC
- [Backend Readme](backend/readme.md)

--------

# TO SETUP FRONTEND - FRONTEND BACKEND DOC
- [Frontend Readme](frontend/README.md)

--------





# codechallenge-moolahgo
The Task
--------
There are 2 parts to the task.
1. To write a micro service using PHP (vanilla PHP, CI or Lumen only).
2. To write a simple mobile responsive web client to consume the micro service.

The Micro Service
-----------------
The micro service will have 1 REST endpoint, /process. It will take a json value and process it. It will return the result in json as well.
The json will contain the following info: referralcode.

What the "process" endpoint do is to find the owner of the referralcode and return the detail of the owner. In real application, this owner detail will be stored in a db table. However, for this challenge, please create a model with a pre-populated value. Please put a code in comment on how to do that in sql as well. 

The Web Client
--------------
You will create a MOBILE RESPONSIVE web form for user to key in a referral code. This input is required and the referral code should be 6 characters, only contain alphanumeric, all in upper case.

There will be a submit button that is automatically enable/disable based on whether the mandatory fields are populated and valid.

When user submit the form, display a wait icon, submit using ajax to the microservice, and then display the result.

The Process
-----------
- Create a branch from this repository.
- Do all your work, make sure they run correctly in your own environment.
- Push your final work and create a pull request.
- If possible please provide us a link so that we can test your work.
- Otherwise, let us know how to setup your work so that we test it in our own workspace.

What We Are Looking For In This Test
------------------------------------
- Logic, thought process and the ability to pick up new things to complete a job.
- Completeness. We want to see that you are able to get to the final result at the same time covering all the possible edge cases and error checking.
- Simplicity. We want simple codes so maintenance is not a nightmare. This application description maybe long, but the code is simple. There are many libraries out there to help you do the job. Use them.

Hints and Suggestions (optional)
--------------------------------
You can safely skip this part.

If mobile responsiveness, data binding, or ajax are new to you, below are some suggested library you can look into to help you:
- Twitter bootstrap (https://getbootstrap.com/) - for mobile responsive
- Vue (https://vuejs.org/) - for data binding, error checking and ajax
- Jquery (https://jquery.com/) - for data binding, error checking and ajax
