# codechallenge-moolahgo
The Task
--------
The task is to write a PHP application with your own custom MVC architecture (Do not use CI, Laravel, Symphony, etc).

The Application
---------------
You will create a MOBILE RESPONSIVE web form for user to key in a date, an abritrary amount, and a percentage value between -10% to 10% only (a total of 3 fields). The date and amount is mandatory while the percentage is optional. When the user key in the amount, the form will display a final amount below all the fields dynamically. Final amount is the amount + the percentage amount, e.g for 1000 and -5%, the final amount will be $950.00 (display in currency format).

There will be a submit button that is automatically enable/disable based on whether the mandatory fields are populated and whether the field contain invalid value. For example, if the amount field is empty or contain value such as "234s45".
When user submit the form, the application sends the data to your controller, which in turn will use the submitted value and call a model class to calculate the fee for this submission (which is 5% of final value). The controller will then redirect this value with whatever necessary value from the post method back to the same view, which will display back the initial empty form with a list of all the previous submission list below the form. Ajax or html form submit is acceptable as long as the submission history is maintained through out the session.

In real life, this submission will be saved into a database and then load back for display. Therefore, you will need to have a code snippet that show how will submission be stored into the db. The code should be in a model class and written in a syntactically correct code. It should not be called as there will be no db connection in the runtime environment.
You can use any JS library to help you in achieving mobile responsiveness, data binding, UI/UX controls, etc. If you are doing styling on the UI/UX, please use style sheet instead of direct styling (LESS/SASS is great, but not a requirement).

The Process
-----------
- Create a branch from this repository.
- Do all your work, make sure they run correctly in your own environment.
- Push your final work and create a pull request.
- Your work will be copied verbatim into our own environment and expected to run perfectly from Chrome browser. Therefore, make sure it has index.php or index.html on the main folder. Also, make sure it does not depends on your own environment folder structure. If you use any third party library, please include them as well in your submission. In the case of JS library, you can opt for CDN link in your code.

What We Are Looking For In This Test
------------------------------------
- Logic, thought process and the ability to pick up new things to complete a job.
- Completeness. We want to see that you are able to get to the final result at the same time covering all the possible edge cases and error checking.
- Simplicity. We want simple codes so maintenance is not a nightmare. This application description is long, but the code is simple. There are many libraries out there to help you do the job. Use them.

Hints and Suggestions (optional)
--------------------------------
You can safely skip this part.

If mobile responsiveness, data binding, or ajax are new to you, below are some suggested library you can look into to help you:
- Twitter bootstrap (https://getbootstrap.com/) - for mobile responsive
- Vue (https://vuejs.org/) or React (https://reactjs.org/) - for data binding, error checking and ajax
- Jquery (https://jquery.com/) - for data binding, error checking and ajax.
