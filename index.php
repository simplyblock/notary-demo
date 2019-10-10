
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Bitcoin Notary Sample</title>

        <meta name="description" content="Notarize documents on the Bitcoin block chain">
        <link rel="shortcut icon" href="/img/favicon.png" />

        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>

    <body>

        <div class="hero">
            <h1 class="display-3">Notary Demo</h1>
            <p class="lead fg-primary">Prove ownership on the Stellar Blockchain for only <span>0.00001 XLM </span><span id="BCHUSD"></span>.</p>


            <svg width="0" height="0" data-reactid="5"><defs data-reactid="6"><clipPath id="top-mask" clipPathUnits="objectBoundingBox" data-reactid="7"><polygon points="0 0, 1 0, 1 0.9, 0 1" data-reactid="8"></polygon></clipPath></defs></svg>
        </div>


        <div class="container pt-5">


            <div class="row cta">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="cta-icon">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    </div>
                    <h3>Select Your document</h3>
                    <p>Add your file by dragging it into the browser or using the file selector below.</p>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="cta-icon">
                        <i class="fa fa-anchor" aria-hidden="true"></i>
                    </div>
                    <h3>Fund Your Anchor</h3>
                    <p>Send Bitcoin Cash (BCH) to the address provided and fund your blockchain anchor.</p>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="cta-icon">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </div>
                    <h3>Sign To The Blockchain</h3>
                    <p>Your file will be forever signed into the blockchain with a unique address and timestamp.</p>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="cta-icon">
                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                    </div>
                    <h3>View Your Proof</h3>
                    <p>See your proof on the blockchain by checking the transaction in a block explorer. </p>
                </div>

            </div>

            <div class="card my-5" >
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);" id="card-nav-notarize">Notarize</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" id="card-nav-verify">Verify</a>
                        </li>
                    </ul>
                </div>
                <div class="card-block" id="process-start">

                    <form method="" action="" name="submit_info" id="submit_info" enctype="multipart/form-data">
                        <div class="row col-md-12">

                            <div class="col-md-6">
                                <h3 class="card-title verify-mode">User 1</h3>

                                <div class="form-group">
                                    <label for="user1_name">Name:</label>
                                    <input type="text" class="form-control" id="user1_name" placeholder="Enter Your name" name="user1_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="user1_email">Email:</label>
                                    <input type="email" class="form-control" id="user1_email" placeholder="Enter email" name="user1_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Text Sample:</label>
                                    <textarea class="form-control" id="text_sample" name="text_sample"></textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title verify-mode">User 2</h3>
                                <div class="form-group">
                                    <label for="user2_name">Name:</label>
                                    <input type="text" class="form-control" id="user2_name" placeholder="Enter Your name" name="user2_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="user2_email">Email:</label>
                                    <input type="email" class="form-control" id="user2_email" placeholder="Enter email" name="user2_email" required>
                                </div>
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <input type="submit" class="form-control btn-primary btn-lg" id="submit" value="Submit" name="submit" style="cursor: pointer">
                                </div>

                            </div>

                        </div>

                    </form>
                    <div class="card-template" id="hashed_data_div" style="display: none;">
                        <form method="" action="" name="broadcast_info" id="broadcast_info" enctype="multipart/form-data">
                            <div class="row col-md-12">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="hashed_data">Hashed Data:</label>
                                        <input type="text" class="form-control" id="hashed_data" name="hashed_data" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="broadcast_btn">&nbsp;</label>
                                        <input type="submit" class="form-control btn-primary btn-md" id="broadcast_btn" value="Broadcast" name="broadcast_btn" style="cursor: pointer">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-template" id="broadcast_div" style="display: none;">
                        <div id="broadcast_data" class="row col-md-12">
                            <div class="col-md-9">
                                <label for="broadcast_input">Transaction ID:</label>
                                <input type="text" class="form-control" id="broadcast_input" name="broadcast_input" readonly value="">
                            </div>
                            <div class="form-group col-md-3">
                                <label>&nbsp;</label>
                                <label id="message_sent_lbl"></label>
                            </div>
                        </div>
                    </div>
                    <div class="card-template-error" id="hashed_data_div_error" style="display: none;">
                        <div class="row col-md-12">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label id="hashed_data_error"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-block" id="process-processing" style="display:none;">

                    <form method="" action="" name="verify_info" id="verify_info" enctype="multipart/form-data">
                        <div class="row col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data_hash2">Hashed Data:</label>
                                    <input type="text" class="form-control" id="data_hash2" name="data_hash2">
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">

                                    <label for="transaction_id">Transaction ID:</label>
                                    <input type="text" class="form-control" id="transaction_id" placeholder="Enter transaction id" name="transaction_id">
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <input type="submit" class="form-control btn-primary btn-lg" id="verify" value="Verify" name="verify" style="cursor: pointer">
                                </div>
                            </div>

                        </div>

                    </form>
                    <div class="card-template" id="verify_div" style="display: none;">
                        <div id="verify_data" class="row col-md-12" style="margin-top: 20px;">
                        </div>
                    </div>
                </div>
                
            </div>

            <h3 class="mt-4 mb-3">How it works</h3>
            <ol>
                <li>Add your file by dragging it into the browser or using the file selector above.</li>
                <li>Follow the prompt to send Bitcoin Cash (BCH) and fund your blockchain anchor. </li>
                <li>See your proof on the blockchain by checking the transaction in a block explorer.</li>
            </ol>
            <a href="javascript:void();" id="knowmore" type="button" style="-webkit-appearance:none;" data-toggle="collapse" data-target="#collapseFaq" aria-expanded="false" aria-controls="collapseExample">(more...)</a>

            <div class="collapse mt-4" id="collapseFaq">
                <h3 class="display-4">Be your own Notary</h3>
                <p class="lead">Prove timestamped existence of a document without trusted third parties.</p>      

                <div class="row">   

                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header faq-header">
                                <h4>What?</h4>
                            </div>
                            <div class="card-block">
                                <p>
                                    Historically, governments acted as trusted third parties by issuing important life documents (like property titles, drivers licenses, and birth certificates).
                                </p>      
                                <p>
                                    Pre-bitcoin document proof was characterized by Greco-Roman columns, long lines, unpleasant demeanors, ceremonial vestments, and poor building maintenance.
                                </p>
                                <p>
                                    Today, these roles can be automated.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header faq-header"> 
                                <h4>How?</h4>
                            </div>
                            <div class="card-block">        
                                <p>
                                    With Notary, you can create your own universal timestamped proof of a document's existence.
                                </p>
                                <p>
                                    A cryptographic digest of your document will be stored in the Bitcoin Cash (BCH) blockchain, linking it to the time of submission. 
                                </p>        
                                <p>
                                    Your document could be anything, from an input-constrained form like conventional government documents to a full-resolution movie or location-stamped image.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header faq-header">
                                <h4>Why?</h4>
                            </div>
                            <div class="card-block">    
                                <p>
                                    Trustlessly backing up important documents allows you to prove existence even when an official version goes missing.
                                </p>
                                <p>
                                    You control your own information &mdash; your document's contents are not stored in the blockchain or ever exposed. 
                                </p>
                                <p>
                                    Prove your document existed by comparing the blockchain entry of your document's cryptographic digest
                                    to your actual document (if and when the need arises).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="mt-5 mb-4">Examples</h3>  

                <h4 class="mt-4 mb-3">Prove data ownership</h4>

                <p class="mb-0">
                    In most jurisdictions, applying for a patent or proving ownership of copyrighted material involves 
                    unpleasant (and wildly expensive) third parties. With Notary, you can prove
                    ownership of information at a given time without revealing the actual information.
                </p>   
                <center>
                    <table class="table faq-table faq-rounded">
                        <caption>
                            Example 1: United States Patent Office versus personal use of Notary
                        </caption>
                        <thead>
                            <tr>
                                <th>
                                    <h4>
                                        Features
                                    </h4>
                                </th>
                                <th>
                                    <h4>
                                        U.S. Patent Office
                                    </h4>
                                </th>
                                <th>
                                    <h4>
                                        Notary
                                    </h4>
                                </th>
                            </tr>
                        </thead>      
                        <tbody>
                            <tr>
                                <td class="faq-feature">
                                    Costs more than $10,000 USD and takes more than a year to process
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="faq-feature">
                                    Can only be upheld by expensive third parties in robes
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="faq-feature">
                                    Immediate, inexpensive confirmation
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="faq-feature">
                                    Trivially upheld by supra-legal mathematical postulates
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="faq-feature">
                                    Participation is voluntary
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </center>


                <h4 class="mt-5 mb-3">Prove data integrity</h4>

                <p class="mb-0">
                    Some documents, like property titles, have important consequences linked to changes in the document over time. You can use Notary to prove that a document has existed in an unchanged form. Prove your document did not change by matching your file's cryptographic digest at some future date to the one you stored in the blockchain with Notary. 
                </p>
                <center>    
                    <table class="table faq-table faq-rounded">
                        <caption>
                            Example 2: Conventional Title Insurance versus personal use of Notary
                        </caption>
                        <thead>
                            <tr>
                                <th>
                                    <h4>
                                        Features
                                    </h4>
                                </th>
                                <th>
                                    <h4>
                                        Title Insurance
                                    </h4>
                                </th>
                                <th>
                                    <h4>
                                        Notary
                                    </h4>
                                </th>
                            </tr>
                        </thead>      
                        <tbody>
                            <tr>
                                <td class="faq-feature">
                                    Costs about $5,000
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="faq-feature">
                                    Mostly exists to promote illusion of ownership
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="faq-feature">
                                    Ultimately subject to political climate
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="faq-feature">
                                    May be violently over-ruled, but never deleted or disproven
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="faq-feature">
                                    Participation is voluntary
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                            </tr>
                        </tbody>      
                    </table>     
                </center>      


                <h4 class="mt-5 mb-3">Prove data existed at a certain time</h4>

                <p class="mb-0">
                    The Bitcoin Cash (BCH) blockchain is globally distributed and requires proof of work to update. Your submission
                    forever proves the existence of your document in its current state at the time of your submission.
                </p>
                <center>        
                    <table class="table faq-table faq-rounded">
                        <caption>
                            Example 3: Government-issued Birth Certificate versus selfie with infant, added to Notary
                        </caption>
                        <thead>
                            <tr>
                                <th>
                                    <h4>
                                        Features
                                    </h4>
                                </th>
                                <th>
                                    <h4>
                                        Birth Certificate
                                    </h4>
                                </th>
                                <th>
                                    <h4>
                                        Notary
                                    </h4>
                                </th>
                            </tr>
                        </thead>      
                        <tbody>
                            <tr>
                                <td class="faq-feature">
                                    Physically degrades with time
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="faq-feature">
                                    Can only be accessed by calling parents, waiting, and hoping
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="faq-feature">
                                    Validity depends on trusted issuer
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="faq-feature">
                                    Immutable; permanently and privately accessible from your phone
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="faq-feature">
                                    Participation is voluntary
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-x proof-negative" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/></svg>
                                </td>
                                <td class="faq-comp">
                                    <svg version="1.1" width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check proof-verified" aria-hidden="true"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"/></svg>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </center>

                <h4 class="mt-5 mb-3">Practical considerations</h4>
                <p class="mb-5">
                    In most of the world, humans are still required to participate in multiple forms of conventional document proof. As reputation and identity become key components of the digital world, the existence of a voluntary alternative will support information privacy and ownership.
                </p>
            </div>

            <div class="pb-4"></div>  

        </div><!-- .container -->
        <div class="overlay-page" id="loading_image">
            <div id="page-loader" >
                <img src="https://www.playgroup.org/pics/loader-green.gif">
            </div>
        </div>
        <div id="bitcoincom-uc-footer" style="background: #000; padding: 17px 0 1px;">
            <p style="color:#FFF; font-size: 16px; text-align: center;">© 2018 Landing. All rights reserved.</p>
        </div>


        <script type="text/javascript">
            $(document).ready(function () {
                $('#card-nav-verify').click(function () {
                    $('#process-processing').css("display", "block");
                    $('.nav-link').addClass('active');
                    $('#card-nav-notarize').removeClass("active");
                });
                $('#card-nav-verify').click(function () {
                    $('#process-start').hide();

                });
                $('#card-nav-notarize').click(function () {
                    $('#process-start').show();
                    $('.nav-link').addClass('active');
                    $('#card-nav-verify').removeClass("active");
                });
                $('#card-nav-notarize').click(function () {
                    $('#process-processing').hide();
                })

                $("#knowmore").click(function () {
                    $("#collapseFaq").toggle();
                });

            })

            $(document).on("submit", '#submit_info', function (e) {


                var user1_name = $('#user1_name').val();
                var user1_email = $('#user1_email').val();
                var user2_name = $('#user2_name').val();
                var user2_email = $('#user2_email').val();
                var text_sample = $('#text_sample').val();
                $('#hashed_data_div').hide();
                $('#broadcast_div').hide();
                $('#hashed_data_div_error').hide();
                
                $.ajax({
                    url: 'ajax_data.php',
                    type: 'POST',
                    data: {cmd: 'create_hash', text_sample: text_sample},
                    success: function (data, textStatus, jQxhr) {

                        var obj = $.parseJSON(data);
                        if (obj.success == true)
                        {
                            $('#hashed_data').val(obj.data.hash);
                            $('#hashed_data_div').show();
                        }
                        else{
                            var errors_html = obj.errors.join('<br/>');
                            $('#hashed_data_error').html(errors_html);
                            $('#hashed_data_div_error').show();
                        }
                    },
                    error: function (jqXhr, textStatus, errorThrown) {
                        console.log(errorThrown);
                    }
                });

                return false;

            });


            $(document).on("submit", '#broadcast_info', function (e) {
                $('#loading_image').show();
                $('#hashed_data_div_error').hide();
                var hashed_data = $('#hashed_data').val();
                var user1_name = $('#user1_name').val();
                var user1_email = $('#user1_email').val();
                var user2_name = $('#user2_name').val();
                var user2_email = $('#user2_email').val();
                var text_sample = $('#text_sample').val();
                $.ajax({
                    url: 'ajax_data.php',
                    type: 'POST',
                    data: {cmd: 'broadcast_hash', data_hash: hashed_data, user1_name: user1_name, user1_email: user1_email, user2_name: user2_name, user2_email: user2_email, text_sample: text_sample},
                    success: function (data, textStatus, jQxhr) {
                        var obj = $.parseJSON(data);
                        if (obj.success == true)
                        {
                            $('#broadcast_input').val(obj.data['tx_hash']);
                            $('#message_sent_lbl').html('Message has been sent.');
                            $('#broadcast_div').show();
                        }
                        else{
                            var errors_html = obj.errors.join('<br/>');
                            $('#hashed_data_error').html(errors_html);
                            $('#hashed_data_div_error').show();
                        }
                        $('#loading_image').hide();
                    },
                    error: function (jqXhr, textStatus, errorThrown) {
                        console.log(errorThrown);
                        $('#loading_image').hide();
                    }
                });

                return false;

            });
            
            
            $(document).on("submit", '#verify_info', function (e) {
                $('#loading_image').show();
                var data_hash2 = $('#data_hash2').val();
                $('#verify_info').html();
                $.ajax({
                    url: 'ajax_data.php',
                    type: 'POST',
                    data: {cmd: 'verify_hash', data_hash2: data_hash2 },
                    success: function (data, textStatus, jQxhr) {
                            $('#verify_data').html(data);
                            $('#verify_div').show();
                            $('#loading_image').hide();
                    },
                    error: function (jqXhr, textStatus, errorThrown) {
                        console.log(errorThrown);
                    }
                });

                return false;

            });

        </script>

    </body>
</html>

