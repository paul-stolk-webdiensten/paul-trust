<?php
/**
 * Created by PhpStorm.
 * User: paulstolk
 * Date: 22-10-17
 * Time: 00:02:29
 */
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>{page_title}</h1>
            <p>On this page I explain what I did, and why I did it this way.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Goal</h2>
            <p>First I looked at what the goal of the website was going to be. This was to give the user an easy way to
                convert an amount in a currency to another currency. I then made a list of features I would like to
                create in order to show that I am an experienced developer.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Web service</h2>
            <p>There were three different web services which could be used to get the current (or historical) exchange
                rates. I examined them all, and I quickly came to the conclusion that one was the most easy to work
                with: <a href="http://fixer.io/" target="_blank">http://fixer.io/</a>. All I needed to get the right
                information was to different calls (to get the current exchange rates and to get the historical exchange
                rates). I tried it out in the browser and came to the conclusion that I was going for this particular
                web service.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Git</h2>
            <p>The second thing I did was create a Git repository, which can be found on <a
                        href="https://github.com/paul-stolk-webdiensten/paul-trust" target="_blank">https://github.com/paul-stolk-webdiensten/paul-trust</a>
                . In this way I could easily keep track of what I did,
                and I could show that I know how to use Git. I made commits, new braches, merged branches and of course
                pushed to the remote.</p>
            <p>
                <img src="/assets/images/git-branches.png" style="height: 300px; max-width: 100%;"><br/>
                The different Git branches.
            </p>
            <p>
                <img src="/assets/images/git-commits.png" style="height: 300px; max-width: 100%;"><br/>
                The different Git commits in the Master branch.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>CodeIgniter & Bootstrap</h2>
            <p>For this project I chose for the CodeIgniter framework and Bootstrap. The reason I chose for CodeIgniter
                was because I can work quite fast with it. The website wouldn't be too complicated, so I think a
                framework like Laravel would be an overkill. <br/>
                I am horrible at designing, and I didn't want to create a whole new CSS file, so Bootstrap was a way to
                quickly setup this website.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Database</h2>
            <p>I then created the database. I made a 'rates' table for storing all the rates. In this way I didn't have
                to retrieve the currencies from the web service every time I wanted to convert something. This made me
                less depend on the web service.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Three parts: Converter, API & Populator</h2>
            <p>I split this website up in three parts, which are explained below.</p>
            <h3>Converter</h3>
            <p>The converter is the homepage of this website. It is the actual exchange rate converter. I made this
                completely independently, meaning it could be used on any other domain, without having the other two
                parts on
                the same domain. This is because the converter gets the currencies and rates from my own API. </p>
            <h3>API</h3>
            <p>Anyone with the right URL can get the required information to convert the currencies. I chose not to
                protect this with, for example, a password. In this way anyone interested can use the API for free.</p>
            <h3>Populator</h3>
            <p>The API needs to have data to output. The data is received from the web service fixer.io. The populator
                gets the current and historical rates, and puts them in the local database. Retrieving the history
                should only be needed once, after which it is not needed anymore because the new rates are retrieved by
                a cron.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Cron</h2>
            <p>The exchange rates need to be updated every day. This is why I had set a cron to automatically retrieve
                and save the exchange rate from fixer.io. I recommend to set the cron every 6 hours. Theoretically once
                every 24 hours should be fine, but if the rates cannot be received or saved for any reason, it is good
                to have 3 more moments every day to try and save the rates.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Things I didn't do</h2>
            <p>On the day I made this I also had other things to do, which is the reason I did not make everything I
                thought of earlier. Below you can find a list of things I would have done if I had more time or if it
                was a real production website.</p>
            <ul>
                <li>
                    Statistics: show advanced statistics with graphs and tables. The necessary data is already saved in
                    the database.
                </li>
                <li>
                    Blueprint: make a blueprint of the technical environment: which PHP version, which MySqli version
                    etc.
                </li>
                <li>
                    Documentation: make a more nice documentation than this page.
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Conclusion</h2>
            <p>
                I really liked doing this test. It made me think about all the different things I could implement on
                this site, all around exchange rates. I wanted to technically challenge myself. It is too bad that I did
                not have the time to make it all. <br/>
                Hopefully this test gives the right impression of my coding skills. I would be more than happy to
                explain everything in detail face to face.
            </p>
        </div>
    </div>


</div>