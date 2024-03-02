<?php if (isset($_COOKIE['user_id'])) {
  $user_id = $_COOKIE['user_id'];
} else {
  $user_id = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="website icon " href="Logo Icon 16_16.svg">
  <title>Terms & Conditions</title>
  <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXVP8RTRY0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WXVP8RTRY0'); </script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");

    :root {
      --primary-clr: #6c00f9;
      --white: #fff;
      --text-clr: #464646;
      --tabs-list-bg-clr: #dfc8fd;
      --btn-hvr: #4e03b0;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      list-style: none;
      font-family: "Open Sans", sans-serif;
      scroll-behavior: smooth;
    }

    body {
     
      font-size: 12px;
      color: var(--text-clr);
    }

    .top {
      height: 8vh;
    }

    .flex_align_justify {

      display: flex;
      align-items: center;
      justify-content: center;
    }

    .wrapper {
      min-height: 100vh;
      padding: 0 20px;
    }

    .tc_wrap {
      width: 1000px;
      max-width: 100%;
      height: 600px;
      background: var(--white);
      display: flex;
      border-radius: 3px;
      overflow: hidden;
    }

    .tc_wrap .tabs_list {
      width: 180px;
      background: #4AE9E9;
      height: 100%;
      overflow-y: auto;
    }

    .tc_wrap .tabs_content {
      width: calc(100% - 200px);
      padding: 0 10px 0 20px;
      height: 100%;
    }

    .tc_wrap .tabs_content .tab_head,
    .tc_wrap .tabs_content .tab_foot {
      color: var(--primary-clr);
      padding: 25px 0;
      height: 70px;
    }

    .tc_wrap .tabs_content .tab_head {
      text-align: center;
    }

    .tc_wrap .tabs_content .tab_body {
      height: calc(100% - 140px);
      overflow: auto;
    }

    .tc_wrap .tabs_list ul {
      padding: 70px 20px;
      text-align: right;
    }

    .tc_wrap .tabs_list ul li {
      padding: 10px 0;
      position: relative;
      margin-bottom: 3px;
      cursor: pointer;
      font-weight: bold;
      transition: all 0.5s ease;
    }

    .tc_wrap .tabs_list ul li:before {
      content: "";
      position: absolute;
      top: 0;
      right: -20px;
      width: 2px;
      height: 100%;
      background: #031B64;
      opacity: 0;
      transition: all 0.5s ease;
    }

    .tc_wrap .tabs_list ul li.active,
    .tc_wrap .tabs_list ul li:hover {
      color: #031B64;
    }

    .tc_wrap .tabs_list ul li.active:before {
      opacity: 1;
    }

    .tc_wrap .tabs_content .tab_body .tab_item h3 {
      padding-top: 10px;
      margin-bottom: 10px;
      color: #031B64;
    }

    .tc_wrap .tabs_content .tab_body .tab_item p {
      margin-bottom: 20px;
    }

    .tc_wrap .tabs_content .tab_body .tab_item.active {
      display: block !important;
    }

    .tc_wrap .tabs_content .tab_foot button {
      width: 125px;
      padding: 5px 10px;
      background: transparent;
      border: 1px solid;
      border-radius: 25px;
      cursor: pointer;
      transition: all 0.5s ease;
    }

    .tc_wrap .tabs_content .tab_foot button.decline {
      margin-right: 15px;
      border-color: var(--tabs-list-bg-clr);
      color: var(--tabs-list-bg-clr);
    }

    .tc_wrap .tabs_content .tab_foot button.agree {
      background: var(--primary-clr);
      border-color: var(--primary-clr);
      color: var(--white);
    }

    .tc_wrap .tabs_content .tab_foot button.decline:hover {
      background: var(--tabs-list-bg-clr);
      color: var(--white);
    }

    .tc_wrap .tabs_content .tab_foot button.agree:hover {
      background: var(--btn-hvr);
      border-color: var(--btn-hvr);
    }
  </style>
  <link rel="stylesheet" href="header_footer.php">
</head>

<body>
  <?php include 'header.php' ?>
  <div class="top"></div>
  <div class="wrapper flex_align_justify">
    <div class="tc_wrap">
      <div class="tabs_list">
        <ul>
          <li data-tc="tab_item_1" class="active">DEFINITIONS </li>
          <li data-tc="tab_item_2">INTERPRETATION </li>
          <li data-tc="tab_item_3">ACCEPTANCE OF THE TERMS AND CONDITIONS </li>
          <li data-tc="tab_item_4">ACCESS TO THE SITE</li>
          <li data-tc="tab_item_5">SUBSCRIPTION PLANS</li>
          <li data-tc="tab_item_6">USER INFORMATION </li>
          <li data-tc="tab_item_7">RIGHTS OF SPACEKRAFT</li>
          <li data-tc="tab_item_8">EUROPEAN UNION DATA PROTECTION RIGHTS </li>
          <li data-tc="tab_item_9">UNAUTHORIZED ACCESS</li>
          <li data-tc="tab_item_10">USE OF INFORMATION</li>
          <li data-tc="tab_item_11">SPACEKRAFT PLATFORM</li>
          <li data-tc="tab_item_12"> SPACEKRAFT PAY TERMS & CONDITIONS</li>
          <li data-tc="tab_item_13">SPACEKRAFT PACKERS AND MOVERS TERMS & CONDITIONS</li>
          <li data-tc="tab_item_14">CONTENT ON THE SITE</li>
          <li data-tc="tab_item_15">USER GENERATED CONTENT</li>
          <li data-tc="tab_item_16">INTELLECTUAL PROPERTY</li>
          <li data-tc="tab_item_17">OPERATIONAL HAZARDS/ COMPUTER VIRUS ATTACKS</li>
          <li data-tc="tab_item_18">DISCLAIMER</li>
          <li data-tc="tab_item_19">GRANT OF RIGHTS TO SPACEKRAFT’S FINANCE PARTNERS: </li>
          <li data-tc="tab_item_20">LIMITATION OF LIABILITY</li>
          <li data-tc="tab_item_21"> INDEMNITY</li>
          <li data-tc="tab_item_22">USER GRIEVANCE</li>
          <li data-tc="tab_item_23">GUIDELINES FOR LAW ENFORCEMENT AGENCIES (LEAs)/ REPORT A FRAUD </li>
          <li data-tc="tab_item_24"> WAIVER AND SEVERABILITY</li>
          <li data-tc="tab_item_25">AMENDMENT</li>
          <li data-tc="tab_item_26">GOVERNING LAW AND JURISDICTION</li>
        </ul>
      </div>
      <div class="tabs_content">
        <div class="tab_head">
          <h2 style='color:#031B64'>Terms & Conditions </h2>
        </div>
        <div class="tab_body">
          <div class="tab_item tab_item_1">
            <h3>DEFINITIONS</h3>
            <p>Unless otherwise specified, the capitalized terms shall have the meanings set out below:

              Account means and includes the account created on the Site, by the User, in accordance with the terms of the Agreement, registered with and approved by SpaceKraft.

              Agreement means and includes the Terms and Conditions, Privacy Policy and any other such terms and conditions that may be mutually agreed upon between SpaceKraft and the User in relation to the Services. </p>
            <p>Applicable Law means and includes any statute, law, regulation, sub-ordinate legislation, ordinance, rule, judgment, rule of law, order (interim or final), writ, decree, clearance, Authorizations, approval, directive, circular guideline, policy, requirement, code of practice or guidance note, or other governmental, regulatory, statutory, administrative restriction or any similar form of decision, or determination by, or any interpretation or administration of any of the foregoing by, any statutory or regulatory authority or government agency or any other authority, in each case having jurisdiction over the subject matter of this Agreement. </p>
            <p>Broker means and includes all brokers, channel partners, sales agencies and other third parties who/ which negotiate or act on behalf of one person in a transaction of transfer including sale, purchase, leave and license, lease or such other form of transfer in relation to a retail space, shop front, Canopy, plot, apartment or building, as the case may be, including marketing and promotion of such plot, apartment or building, for remuneration or fees or any other charges for his services whether as commission or otherwise and incudes a person who introduces, through any medium, prospective parties to each other for negotiations and includes property dealers, brokers, middlemen by whatever name called and real estate agent as defined under the Real Estate (Regulation and Development) Act, 2016. </p>
            <p>Computer Virus means and includes any computer instruction, information, data, or programme that destroys, damages, degrades, or adversely affects the performance of a computer resource or attaches itself to another computer resource and operates when a programme, data or instruction is executed or some other event takes place in that computer resource. </p>
            <p>Confidential Information means and includes all information that is not in the public domain, in spoken, printed, electronic or any other form or medium, relating directly or indirectly to, the assets, business processes, practices, methods, policies, subscription plans, publications, documents, research, operations, services, strategies, techniques, agreements, contracts, terms of agreements, transactions, potential transactions, negotiations, pending negotiations, know-how, trade secrets, computer programs, computer software, applications, operating systems, software design, web design, work-in-process, databases, manuals, records and reports, articles, systems, material, sources of material, supplier identity and information, vendor identity and information, User identity and information, financial information, results, accounting information, accounting records, legal information, marketing information, advertising information, pricing information, credit information, developments, internal controls, security procedures, graphics, drawings, sketches, sales information, costs, formulae, product plans, designs, ideas, inventions, original works of authorship, discoveries and specifications, of SpaceKraft and/or affiliates or their respective businesses, or any existing or prospective customer, supplier, investor or other associated third party, or of any other person or entity that has entrusted information to SpaceKraft in confidence. </p>
            <p>Content means and includes any information all data and information on the Site. <br>
              Government Authority means and includes any government, any state or other political subdivision thereof, any entity exercising executive, legislative, judicial, regulatory or administrative functions of or pertaining to government, or any other government authority, agency, department, board, commission or instrumentality or any political subdivision thereof, and any court, tribunal or arbitrator(s) of competent jurisdiction, and, any Government or non-Government self-regulatory organization, agency or authority; having jurisdiction over the Agreement and the Services contemplated under the Agreement. </p>
            <p>Information Technology Act means the Information Technology Act, 2000. <br>

              Intellectual Property means and includes patents, inventions, know how, trade secrets, trademarks, service marks, designs, tools, devices, models, methods, procedures, processes, systems, principles, algorithms, works of authorship, flowcharts, drawings, and other confidential and proprietary information, data, documents, instruction manuals, records, memoranda, notes, user guides, ideas, concepts, information, materials, discoveries, developments, and other copyrightable works, and techniques in either printed or machine-readable form, whether or not copyrightable or patentable, each of which is not in the public domain or would by its very nature fall within public domain. </p>
            <p>Intellectual Property Rights mean and include (a) all right, title, and interest under including but not limited to patent, trademark, copyright under the Patents Act, 1970, Trademarks Act, 1999 and Copyright Act, 1957 respectively; any statute or under common law including patent rights; copyrights including moral rights; and any similar rights in respect of Intellectual Property, anywhere in the world, whether negotiable or not; (b) any licenses, permissions and grants in connection therewith; (c) applications for any of the foregoing and the right to apply for them in any part of the world; (d) right to obtain and hold appropriate registrations in Intellectual Property; (e) all extensions and renewals thereof; (f) causes of action in the past, present or future, related thereto including the rights to damages and profits, due or accrued, arising out of past, present or future infringements or violations thereof and the right to sue for and recover the same; (g) any Confidential Information. </p>
            <p>SpaceKraft means and includes SpaceKraft Innovations LLP, a company incorporated under the Companies Act, 2013 having its registered office at Bengaluru, India including its officers, directors, employees and representatives along with its Site.

              Privacy Policy means and includes the privacy policy of SpaceKraft more particularly described in Section II. </p>
            <p>Prohibited Conduct means and includes the User’s use of the Service in contravention of the Agreement and Applicable Law; violation of or the abetment of violation of third party rights; infringement or misappropriation of SpaceKraft’s or any persons Intellectual Property Right; attempt to gain or assist another person/ User to gain unauthorized access to the Site and/or Services or its related systems or networks; create internet links to the Site or "frame" or "mirror" any content on any other server or wireless or Internet-based device; act of sending spam, duplicated or unsolicited messages; usage or storage of obscene, threatening, libellous, or otherwise unlawful or tortious material, including material harmful to children or in violation of third party privacy rights leading to harassment, annoyance, anxiety or inconvenience to any person; modify or make derivative works based upon the Service and/or impersonation in relation to any person or entity, claiming a false affiliation, accessing any other Account without permission, or falsely representing User Information. </p>
            <p>Registration Data means and includes the mobile number, e-mail address, username and such other particulars and/or information as may be required by SpaceKraft and supplied by the User on initial application and subscription.

              Personal Information means and includes details of Aadhaar Card, PAN Card, biometric information, financial information such as bank account, debit card, credit card details and such other sensitive information, of the User, and/or concerned person which personally identifies such User and/or person. </p>
            <p>Services means and includes the services provided by SpaceKraft within the territory of India to the User of the Site and shall include the provision of (a) connecting retail space owners and owners of the business, freelancers, artist etc to find each other, (b) services to the Users who wish to post their listings for the purposes of renting their property, (c) services to the Users who wish to secure/hire a retail space for a short term period, (d) services to the Users pertaining to paperwork and documentation processing, relating to lease agreement registration, bank franking, police verification and society approvals with regard to the rental spaces listed on its website. (e) services to those who wish to purchase advertisement space of their products or services on the Site, (f) services to the Users who wish to receive advertisements and promotional messages on the Site and through e-mails and text messages, (g) connecting the Users to various Third Party Service Providers for the provision of other related services.</p>
            <p>Site means and includes the website owned, operated and managed by SpaceKraft Innovations LLP at the URL www.Spacekraft.in and also includes the mobile application owned, operated and managed by SpaceKraft Innovations LLP.

              Terms and Conditions means and includes the terms and conditions contained in the Agreement more particularly set out in Section I.

              Third Party Service Provider means and includes any service provider with whom SpaceKraft has an agreement for the purposes of making services in addition to the Services available for the User. </p>
            <p>User means any person who accesses the Site or avails Services on the Site for the purposes of hosting, publishing, sharing, transacting, displaying or uploading information or views and whether as a tenant or as an owner looking for potential tenants includes other persons jointly participating in using the Site.

              User Information means and includes Registration Data, Personal Information and any other data, details or information in relation to the User, provided by the User to SpaceKraft in relation to the Services, whether through the Site, e-mail or any other form of communication, agreeable to the User and SpaceKraft. </p>
          </div>
          <div class="tab_item tab_item_2" style="display: none;">
            <h3>INTERPRETATION </h3>
            <p>Unless the context otherwise requires or a contrary indication appears: </p>
            <p>(a) Reference to any legislation or law shall include references to any such legislation or law as it may from time to time be amended, supplemented or re-enacted, and any reference to a statutory provision shall include any subordinate legislation made from time to time under that provision. </p>
            <p>(b) Any reference in this Agreement to a person includes any individual, corporation, partnership, unincorporated organization or governmental agency and shall include their respective successors and permitted assigns and in case of an individual shall include his legal representatives, administrators, executors and heirs and in case of a trust shall include the trustee or the trustees for the time being. </p>
            <p>(c) Headings to Sections and Clauses are for ease of reference only and shall be ignored in the construction of the relevant Sections and Clauses. </p>
            <p>(d) The singular includes the plural and vice versa and words importing a particular gender include all genders. </p>
            <p>(e) The words ‘other’ or ‘otherwise’ and ‘whatsoever’ will not be construed ejusdem generis or be construed as any limitation upon the generality of any preceding words or matters specifically referred to. </p>
          </div>
          <div class="tab_item tab_item_3" style="display: none;">
            <h3>ACCEPTANCE OF THE TERMS AND CONDITIONS </h3>
            <p>(a) SpaceKraft agrees to provide to the User and the User agrees to avail from SpaceKraft the Services in accordance with and on the basis of this Agreement and the User’s acceptance of the Terms and Conditions and Privacy Policy constitute the Agreement between the User and SpaceKraft and such Agreement shall deem to replace all previous arrangements between the User and SpaceKraft in relation to the Services and access of the Site. </p>
            <p>(b) The User undertakes to be bound by the Agreement each time the User accesses the Site, completes the registration process </p>
            <p>(c) The User represents and warrants to SpaceKraft that the User is 18 (eighteen) years of age or above, and is capable of entering into, performing and adhering to the Agreement. Individuals under the age of 18 (eighteen) may access the Site or avail a Service only with the involvement, guidance, supervision and/or prior consent of their parents and/or legal guardians, through the Account of or under the guidance of such parent/ legal guardian. SpaceKraft shall not be responsible for verifying if the User is at least 18 (eighteen) years of age. </p>
          </div>
          <div class="tab_item tab_item_4" style="display: none;">
            <h3>ACCESS TO THE SITE</h3>
            <p>i. First time Users can access the Site for preliminary browsing without creating an Account. </p>
            <p>ii. The User undertakes and agrees to provide User Information, uploading Content and create an Account in order to retrieve specific information and avail the Services. </p>
            <p>iii. SpaceKraft shall verify the Account by requesting for the one-time password from the User. The User undertakes and agrees that a mobile number can only be used once to create an Account. The User is prohibited from creating multiple Accounts and SpaceKraft reserves the right to conduct appropriate verification to detect such multiplicity of Accounts and take appropriate action. </p>
            <p>iv. The User undertakes to cooperate with any of SpaceKraft’s personnel in connecting with the User’s access to the Site, as may be required by SpaceKraft. </p>
          </div>
          <div class="tab_item tab_item_5" style="display: none;">
            <h3>SUBSCRIPTION PLANS</h3>
            <p>i. SpaceKraft offers a combination of Services which the User may subscribe to, subject to the need of the User, upon payment of applicable fees. </p>
            <p>ii. The subscription fee paid by the User is non-refundable except when the User selects the Moneyback Plan as detailed on the Site. </p>
            <p>iii. SpaceKraft reserves the right to revise the fee of any subscription plan without notice to the User at any time prior to, at the time of, during the tenor or post subscription of the plan by the User. SpaceKraft shall intimate the User of such revised fees and the User undertakes to pay to SpaceKraft the difference in the amount after such revision. </p>
          </div>
          <div class="tab_item tab_item_6" style="display: none;">
            <h3>USER INFORMATION</h3>
            <p>i. SpaceKraft shall not be responsible for the accuracy, quality, integrity, legality, reliability, appropriateness and Intellectual Property Rights of and/or in relation to the User Information. </p>
            <p>ii. SpaceKraft shall not be responsible or liable for the deletion, correction, destruction, damage, loss or failure to store any User Information, in whole or in part. </p>
            <p>iii. SpaceKraft reserves the right to withhold access, remove or discard any User Information from the Site, in whole or in part at on its sole discretion. </p>
            <p>iv. SpaceKraft shall have the right but not an obligation to maintain or forward any User Information and to verify the authenticity of any User Information made available to it through the Site or otherwise. </p>
          </div>
          <div class="tab_item tab_item_7" style="display: none;">
            <h3>RIGHTS OF SPACEKRAFT</h3>
            <p>i. SpaceKraft, at all times, reserves the right, to reject or disable an Account in the event of the User’s violation of any Applicable Law or anything done by the User in contravention of this Agreement and including but not limited for any other reason in relation to the safe and secure operation of the Site. </p>
            <p>ii. Subject to Applicable Law, SpaceKraft has an internal infrastructure in order to conduct a background check and verification of the User Information and the Account in order to ensure that the Brokers are not registering themselves on the Site. In the event, a User is detected as a Broker, SpaceKraft has the right to reject or disable such Account without cause. </p>
            <p>iii. SpaceKraft has the right to modify, suspend or terminate all or any part of the Services including its features, structure, fees and layout, and/or suspend or deactivate, whether temporarily or permanently, the User Account and/or User’s access to the Site, at any time, without any prior notice to the User. </p>
            <p>iv. SpaceKraft shall endeavour to provide the User an advance notice, without any obligation to do so, of any suspension or deactivation of the Site for the purposes of repair, any inspection or testing by a Government Authority, or for maintenance, upgradation, testing or any other reason as SpaceKraft may deem fit. SpaceKraft shall use its best efforts to rectify any disruption of or rectify an error on the Site and restore regular operations of the Site. </p>
            <p>v. SpaceKraft has the right to issue notifications, confirmations and other communications to the User, on the Site, through e-mail, text message or any other form as may be agreed to by the User and/or send promotional or other relevant information in relation to the Services to the User. SpaceKraft may also send users occasional e-mail bulletins unless the Users have opted not to receive these e-mails. These e-mails may also contain information, tips and suggestions or any other offer provided by third party. SpaceKraft does not take any responsibility of the validity of any of these offers. The Users shall have the right to unsubscribe from receiving any such notifications or promotional information at any time by sending a mail to info@Spacekraft.in. </p>
          </div>
          <div class="tab_item tab_item_8" style="display: none;">
            <h3>EUROPEAN UNION DATA PROTECTION RIGHTS</h3>
            <p>i. Subject to Applicable Law and in accordance with the European Union General Data Protection Regulations (EU GDPR), Spacekraft acknowledges and undertakes to comply on a best effort basis with the rights available to its Users of European nationality/ EU residents set out below: </p>
            <p>(a) the right to know the purposes for which the User Information shall be collected and used; <br>

              (b) the right to access information that personally identifies the User; <br>

              (c) the right to rectify incorrect information; <br>

              (d) the right to delete or remove information after discontinuation of the Services; <br>

              (e) the right to data portability; <br>

              (f) the right to restrict data or information from being processed; and <br>

              (g) the right to opt out of providing or sharing information with SpaceKraft. </p>
            <p>ii. The Users of SpaceKraft to whom the EU GDPR applies, understand, and acknowledge that these rights shall at all times be subject to Applicable Law and are not an exhaustive list of the rights available pursuant to the EU GDPR. The relevant Users shall exercise any of these rights by raising a personal and direct request with SpaceKraft on info@Spacekraft.in. </p>
          </div>
          <div class="tab_item tab_item_9" style="display: none;">
            <h3>UNAUTHORIZED ACCESS</h3>
            <p>i. The User shall be liable for all acts conducted through the User’s Account and shall be responsible for the safekeeping of the details and password of the Account. </p>
            <p>ii. Subject to Applicable Law, the User is responsible for notifying SpaceKraft immediately upon becoming aware of any unauthorized access into or misuse of the Account causing a breach of security as per the Terms and Conditions and Privacy Policy of SpaceKraft. </p>
            <p>iii. SpaceKraft shall extend support by ensuring immediate termination or suspension of such Account and shall take such other appropriate safety measures as it may deem necessary. Further, SpaceKraft shall not be held liable for any unauthorized access into the Account and/or any loss or damage caused to the User by such unauthorized access or loss or damage caused as a consequence of the delay or failure of the User in informing SpaceKraft about such unauthorized access. </p>
            <p>iv. In order to better protect the secrecy of the User Information, the User is encouraged to change the password of the Account from time to time. </p>
          </div>
          <div class="tab_item tab_item_10" style="display: none;">
            <h3>USE OF INFORMATION</h3>
            <p>i. SpaceKraft undertakes that the procurement, storage, usage and dissemination of all information including User Information and/or Content, as the case may be, pursuant to this Agreement, shall at all times, including upon expiration of the Services or termination of the Agreement with the User, be in accordance with the Information Technology Act 2000, the rules made thereunder and other relevant Applicable Laws. </p>
            <p>ii. The User hereby irrevocably and unequivocally authorizes SpaceKraft to utilize User Information for the purposes including those set out below: </p>
            <p>(a) provision of Services in accordance with the Agreement; <br>

              (b) disclose User Information to its directors, officers, employees, advisors, auditors, counsel, or its authorized representatives on a need-to-know basis for provision of the Services; <br>

              (c) contacting a Third-Party Service Provider and/ or facilitating/ enabling the services of a Third Party Service Provider for the User pursuant to the arrangement between SpaceKraft and such Third Party Service Provider; <br>

              (d) conducting internal studies, consumer research, surveys and preparing reports in connection with the Services; <br>

              (e) entering the registration data for an Account or receiving alerts, contacting a property seller/ buyer; and <br>

              (f) sending alerts, contact details, promotional messages and promotional calls whether by SpaceKraft itself or through its partners/ vendors and sub-partners/ sub-vendors. <br>

              (g) disclosing to third parties (including law enforcement agencies and the User’s building management personnel) personally identifiable information where SpaceKraft has reasonable cause to believe that the Users are guilty of any Prohibited Conduct. </p>
            <p>iii. Third party services </p>
            <p>(a) Subject to the need and request of the User, SpaceKraft shall engage, directly or indirectly, the services of Third-Party Service Providers from time to time in order to provide the Services to the Users, in accordance with the terms and conditions separately agreed to between SpaceKraft and such Third-Party Service Provider.

              (b) SpaceKraft may recommend services of a Third-Party Service Provider to the User to provide a one stop shop experience in relation to ancillary services

              (c) SpaceKraft shall have the unequivocal consent of the User to share User Information, in whole or in part, with the Third-Party Service Provider, without intimation to the User.

              (d) The Site may serve as a platform for relevant and interested Third Party Service Providers for the purposes of advertising or promoting their services in relation to the Services provided by SpaceKraft.

              (e) Nothing contained herein shall constitute or be deemed to constitute an agency or partnership or association of persons for and on behalf of SpaceKraft or any Third-Party Service Provider. The arrangement specified in this clause is strictly executed on principal to principal basis and each concerned person shall be bound for their distinct responsibilities, rights, liabilities and obligations in accordance with the relevant bilateral agreement between such persons. </p>
            <p>iv. Tailored Advertising </p>
            <p>(a) The User acknowledges and agrees that Third Party Service Providers may use cookies or similar technologies to collect information about the User’s pattern of availing the Services, in order to inform, optimize, and provide advertisements based on the User’s visits on the Site and general browsing pattern and report how Third-Party Service Providers advertisement impressions, other uses of advertisement services, and interactions with these impressions and services are in relation to the User’s visits on such third party’s website.

              (b) SpaceKraft also permits Third Party Service Providers to serve tailored advertisements to the User on the Site, and further permits them to access their own cookies or similar technologies on the User’s device to access the Site or avail the Services.

              (c) The User undertakes and agrees that when accessing the Services from a mobile application the User may also receive tailored in-application advertisements. Each operating system provides specific instructions on the prevention of tailored in-application advertisements.

              (d) It is to be noted that SpaceKraft does not guarantee the accuracy, integrity or quality of any content provided by such Third-Party Service Provider. Further, the Users interactions with such Third-Party Service Providers found on or through the Services provided by SpaceKraft on the Site, including payment and delivery of goods or services, and any other terms, conditions, warranties or representations associated with such dealings, are solely between the Users and the Third Party Service Providers. In no event shall SpaceKraft be liable for any damages arising out of any interaction between the User and such Third Party Service Provider. The information provided on the Site is provided to the Users on an "AS IS, WHERE IS" basis. </p>
          </div>
          <div class="tab_item tab_item_11" style="display: none;">
            <h3>SPACEKRAFT PLATFORM</h3>
            <p>The Users agree and acknowledge that SpaceKraft is only an online platform that allows the Users to interact with each other for the purpose of listing their property on the Site and/or searching for appropriate options. The Users further understand and accept that: </p>

            <p>i. The Users are ultimately responsible for choosing and/or interacting with other Users on the Site and SpaceKraft is only a facilitator that shall not be held responsible or liable for the selection and/or interaction of the Users with other Users on the Site.
              <br>
              ii. SpaceKraft may provide the Users the profile previews of other Users who may be suitable to tender to the requirements of the Users based on information that the Users provide to SpaceKraft. Please note that SpaceKraft (i) does not recommend or endorse any other User i.e it does not endorse any retail space owners and tenants registered on the Site; and (ii) does not make any representations or warranties with respect to the other Users or the property listed by them. SpaceKraft shall not be liable, for any reason whatsoever, for any disputes amongst the Users and there is no liability on SpaceKraft for the consequences that the Users may be subjected to while dealing with other Users on the Site.
              <br>
              iii. Information regarding all the Users and/or any third party whose services the Users avail through the Site as displayed on the Site is intended for general reference purposes only. Such information is mainly self-reported by the Users and/or the third party and may change from time to time or become out of date or inaccurate. The Users are encouraged to independently verify any such information the Users see on the Site with respect to the other Users or the property listed by them.
              <br>
              iv. The Users understand and agree that any interactions and associated issues with the other Users and/or the third parties with whom the Users interact through the Site or the third party whose services the Users avail through the Site including but not limited to any service-related issues, any Prohibited Conduct issue, any fraudulent activity is strictly amongst the Users and/or the third party and the User shall not hold SpaceKraft responsible for any such interactions and associated issues. If the Users decide to engage with other Users, the Users do so at their own risk.
              <br>
              v. SpaceKraft cannot assure that all the transactions will be completed nor does SpaceKraft guarantee the ability or intent of the Users to fulfil their obligations under any transaction. SpaceKraft advises the Users to perform their own investigation prior to selecting and/or interacting with the other Users on the Site.

            </p>
          </div>
          <div class="tab_item tab_item_12" style="display: none;">
            <h3>SPACEKRAFT PAY TERMS & CONDITIONS</h3>
            <p>i. Role: Any registered User of the Site may choose to make rent payments, maintenance payments and payment of security deposit/ token amounts, through the payment gateway(s) authorized by SpaceKraft . In this regard, the Users are asked to provide customary billing information such as name, financial instrument information which shall include the bank account number, IFSC code of the User, the details of the landlord to whom the payment has to be made and the address of the property with regard to which the rent or security deposit is to be paid. Users may also be asked to provide a copy of the rental agreement pursuant to which such rent payments are being made. The Users must provide accurate, current, and complete information while making the payment through the Site and it shall be the User’s obligation to keep this information up-to-date at all times. The Users are solely responsible for the accuracy and completeness of the information provided by them and SpaceKraft shall not be responsible for any loss suffered by the User as a result of any incorrect information, including payment information provided by the Users. </p>
            <p>Except for SpaceKraft’s limited role in processing the payments that registered Users authorize or initiate, SpaceKraft is not involved in any underlying transaction between the User, any other User, any third person or any service providers. SpaceKraft is not a bank and does not offer any banking or related services. SpaceKraft may use the services of one or more third parties (each a "Processor") to provide the Service and process the User’s transactions. Further, SpaceKraft does not guarantee payment on behalf of any registered User, other User or Processor and explicitly disclaims all liability for any act or omission of any User or Processor. SpaceKraft is neither an agent of the lessor or lessee or any registered User. SpaceKraft acts solely as an intermediary which facilitates payments between the registered Users making the payment and the intended third-party beneficiaries. </p>
            <p>ii. Authorization: The User acknowledges that SpaceKraft is authorized by the User to hold, receive and disburse funds in accordance with the User’s payment instructions provided through the Site for the purposes of facilitating the transfer of monies to the intended beneficiary as specified by the User on the Site . [The authorization given by the Users permits SpaceKraft (a) to debit or credit the User’s balance, bank account, any credit card, debit card, or other payment cards or any other payment method that SpaceKraft accepts] or (b) to process payment transactions that the Users authorize by generating an electronic funds transfer. [By instructing SpaceKraft to pay another User, the Users authorize and order SpaceKraft to make the payments (less any applicable fees or other amounts we may collect under this Agreement) to such user. SpaceKraft may limit the recipient's ability to use or withdraw the committed funds for such period of time that SpaceKraft has agreed to with the recipient.] </p>
            <p>iii. Fees: The User agrees that they may be charged a service charge by SpaceKraft for using the Site to make rental payments or payment of security deposits.

              iv. Transaction Limits: SpaceKraft may delay, suspend or reject a transaction for any payment(s) for any reason, including without limitation if SpaceKraft suspects that the transaction subjects it to financial or security risk or is unauthorized, fraudulent, suspicious, unlawful, in violation of the terms of this Agreement subject to dispute or otherwise unusual. </p>
            <p>v. Chargebacks: The amount of a transaction may be charged back or reversed to the User (a "Chargeback") if the transaction (a) is disputed by the sender, (b) is reversed for any reason, (c) was not authorized or SpaceKraft has reason to believe that the transaction was not authorized, or (d) is allegedly unlawful, suspicious, or in violation of the terms of this Agreement. The Users owe SpaceKraft and will immediately pay SpaceKraft the amount of any Chargeback and any associated fees, fines, or penalties assessed by SpaceKraft’s Processor, processing financial institutions, or MasterCard, Visa, American Express, Discover, and other payment card networks, associations, or companies ("Networks"). The Users agree to assist SpaceKraft when requested, at the User’s expense, to investigate any of the User’s transactions processed through the Service. For Chargebacks associated with cards, SpaceKraft will work with the Users to contest the Chargeback with the Network or issuing banks should the User choose to contest the Chargeback. In this regard, SpaceKraft will request necessary information from the User to contest the Chargeback and the User’s failure to timely assist SpaceKraft in investigating a transaction, including without limitation providing necessary documentation within 5 business days of SpaceKraft’s request, may result in an irreversible Chargeback. </p>
            <p>vi. Liability: The Users agree not to hold SpaceKraft responsible and/or liable for any issue or claim arising out of any dispute whatsoever between the User and the Processor and/or the User and the User’s bank or financial institution.

              Additionally, please note that SpaceKraft shall not be responsible for any additional fees or charges deducted by the Processors while processing payments in connection with the User’s transaction and SpaceKraft disclaims all liability in this regard. Further, the Users may also be subject to additional terms and conditions imposed by such Processors and the Users should review these terms and conditions before authorizing any payments through the Processors. </p>
            <p>vii. Fraud and restrictions: SpaceKraft may ask for additional documents (like Rental Agreement, Owner/Tenant PAN, Maintenance Bill) where it deems necessary, including in case the transaction looks suspicious. [SpaceKraft will refund the full amount (excluding the nominal processing fees collected by SpaceKraft) without any deductions if SpaceKraft determines it is not a valid rent/token/security deposit/ maintenance payment or if such payment is fraudulent. A valid rent/security deposit payment is one where there exists a legally valid rental agreement between the tenant and the landlord with the rent amount equivalent to what is being transferred on SpaceKraft Pay. A valid maintenance payment is one where there exists a maintenance bill between the payer and the society/RWA. </p>
            <p>viii. Refunds: [In case, SpaceKraft is not able to facilitate transfer the rent amount to the beneficiary account due to any technical difficulties, SpaceKraft will refund the payment back to the source.] The Users are advised not to transfer the rent directly to the landlord until a refund ID is generated and sent to the Users through email and SMS. </p>
            <p>ix. The Users acknowledge and agree that, to the maximum extent permitted by law, the entire risk arising out of the User’s access to and use of the payment Services remains with the Users. If the Users permit or authorize another person to use their SpaceKraft account in any way, the Users shall be responsible for the actions taken by that person. Neither SpaceKraft nor any other party or Processor involved in creating, producing, or delivering the payment Services will be liable for any incidental, special, exemplary, or consequential damages, including lost profits, loss of data or loss of goodwill, service interruption, computer damage or system failure or the cost of substitute products or services, or for any damages for personal or bodily injury or emotional distress arising out of or in connection with these payments terms. </p>
          </div>
          <div class="tab_item tab_item_13" style="display: none;">
            <h3> SPACEKRAFT PACKERS AND MOVERS TERMS & CONDITIONS</h3>
            <p>i. The consignments accepted for despatch through our lorries are carried entirely at owner's risk., The Users are advised to keep their valuables in safe custody during the course of the service. Goods transfer through us is at the sole discretion of the Users. Any concerns that the Users may have during or after the provision of the service should be brought to our notice immediately. SpaceKraft shall not be liable for any mishappening or for any loss or damage other than negligence that the Users may incur in connection with engaging the services. All agreements, damage claims that arise through this service availed of by the User shall be brought to the notice of the Company though our helpdesk ..

              In this regard, SpaceKraft suggests user to assess the inventory properly for any damages before the handover and SpaceKraft recommends the ‘Insurance of Freight’. </p>
            <p>Particulars of the SpaceKraft Transit Insurance: </p>
            <p>(a) For any missing item, the User has to obtain a NDC (Non-delivery certificate) or shortage form immediately from the Company.

              (b) In the case of no NDC, the claim shall not be processed for a missing item.

              (c) For such claims to be legitimate, the claims shall be made within 2 days from the date of completion of the service.

              (d) The User has to obtain a LR copy and damage report certificate immediately from the Company in case of any damage relating to the delivery of the inventory. </p>
            <p>ii. To ensure smooth provision of the service, the Users are required to intimate SpaceKraft in advance if the vehicle of SpaceKraft can enter the premises/lane of the User, the distance between the vehicle of SpaceKraft and the lift/house gate, as the case may be, and the maximum time the vehicle can be retained inside the premises.

              iii. The packing materials used by SpaceKraft is the property of SpaceKraft and will be taken back on the same day of unloading, otherwise, rent will be charged as our Policy.

              iv. The fees quoted by SpaceKraft is subject to various factors and hence a slot is booked in advance. The fees quoted by SpaceKraft may change if the movement date/inventory/distance is changed after confirmation of payment. In this regard, a revised quotation will be offered as per the change in price if necessary. </p>
            <p>v. The fees charged by SpaceKraft for the provision of the Service shall not include (i) any dismantling (carpenter work) and fittings of electrical, electronic appliances; (ii) any Mathadi (Union Labour & related) charges; and (iii) any arranging work which includes pipes, extra wire, fittings associated etc. Additionally, materials have to be purchased separately for such mantle and dismantle work which is not part of the fees quotes by SpaceKraft and have to be borne by the User. </p>
            <p>vi. The mode of payment for the provision of this service shall be at the sole discretion of SpaceKraft.

              vii. Where due to unforeseen circumstances, it is not reasonably practicable for either party to undertake the service, the liability, if any, in such a situation shall be limited to the token amount paid by the User for the service. Where the User cancels the service after the SpaceKraft reaches the pickup location, the transportation charges will be borne by the User, however, the token amount shall be fully refundable on shifting cancellation up to 1 day before the provision of the service. </p>

          </div>
          <div class="tab_item tab_item_14" style="display: none;">
            <h3> CONTENT ON THE SITE</h3>
            <p>SpaceKraft shall endeavor to ensure that the Content on its Site is monitored to ensure that the same is not in contravention of Applicable Law and this Agreement. In this regard, the Users represent and warrant that they shall not do any of the following via the Site or otherwise in connection with the Service: </p>
            <p>(i) attempt or help anyone else attempt to gain unauthorized access to the Site or SpaceKraft’s related systems or networks (including without limitation the impersonation of another User or use of a false identity or address to gain access to the Site);
              <br><br>
              (ii) use the Site to violate the Intellectual Property Rights of any person (including without limitation posting pirated music or computer programs or links to such material on Site or on the User’s Profile);
              <br><br>
              (iii) send spam or otherwise duplicative or unsolicited messages in violation of Applicable Laws;
              <br><br>
              (iv) send or store infringing, obscene, threatening, libelous, or otherwise unlawful or tortious material, including material harmful to children or violative of third party privacy rights;
              <br><br>
              (v) send or store material containing software viruses, worms, Trojan horses or other harmful computer code, files, scripts, agents or programs;
              <br><br>
              (vi) interfere with or disrupt the integrity or performance of the Service or the data contained therein;
              <br><br>
              (vii) license, sublicense, sell, resell, transfer, assign, distribute or otherwise commercially exploit or make available to any third party the Service or any content contained in or made available through the Service in any way;
              <br><br>
              (viii) modify or make derivative works based upon the Service or the Content of SpaceKraft;
              <br><br>
              (ix) create internet "links" to the Site or "frame" or "mirror" any Content on any other server or wireless or internet-based device; or
              <br><br>
              (x) reverse engineer or access the Service in order to (a) build a product competitive with the Service, (b) build a product using ideas, features, functions or graphics similar to those of the Service, or (c) copy any ideas, features, functions or graphics contained in the Service.
            </p>
          </div>

          <div class="tab_item tab_item_15" style="display: none;">
            <h3> USER GENERATED CONTENT</h3>
            <p>The Site may contain user generated content (“UGC”) which SpaceKraft does not pre-screen and which contains views that may be opinions of Users and also of experts. These views do not represent SpaceKraft’s views, opinions, beliefs, morals or values. SpaceKraft does not claim any ownership rights in the text, files, images including photos, videos, sounds, musical works or any UGC that the Users submit or publish on the Site. After posting any UGC on the Site, the Users continue to own the rights that the Users may have in that UGC, subject to the limited license set out here. SpaceKraft shall do its best to monitor, edit or remove such UGC where SpaceKraft considers it appropriate or necessary to do so. SpaceKraft does not promise that the content in or on the Site is accurate, complete or updated, that it will not offend or upset any person or that it does not infringe the Intellectual Property Rights of third parties.

              The Users hereby expressly acknowledge and agree that SpaceKraft will not be liable for the User’s losses or damages (whether direct or indirect) caused by any activity undertaken by the User on the basis of any UGC. </p>
          </div>
          <div class="tab_item tab_item_16" style="display: none;">
            <h3> INTELLECTUAL PROPERTY</h3>
            <p>i. SpaceKraft respects the Intellectual Property Rights of others and asks its Users to do the same. The User shall have the sole responsibility for the Intellectual Property ownership or right to use of any information that the Users submit via the Site and the Users may not use the Site to transmit or reproduce someone else's Intellectual Property.
              <br><br>
              ii. The User shall be held liable for acts including but not limited to those set out below herein, for any such infringement of SpaceKraft’s Intellectual Property Rights:
              <br><br>
              (a) misrepresentation of User Information or Content as their own property;
              <br><br>
              (b) using the Content directly or indirectly, publicly or privately for charging brokerage from the Users;
              <br><br>
              (c) using the Content directly or indirectly, publicly or privately for charging brokerage from any third party; and
              <br><br>
              (d) using the Content to display Broker like behaviour.
              <br><br>
              iii. The User shall not upload, post or otherwise make available on the Site, Intellectual Property without the express permission of the concerned owner and the User shall be solely liable for any damage resulting from any infringement of such Intellectual Property.
              <br><br>
              iv. SpaceKraft reserves the right to initiate appropriate legal proceedings against any User or third party for an infringement of its Intellectual Property Rights, in accordance with Applicable Law.
              <br><br>
              v. The User further accepts and agrees that SpaceKraft shall have Intellectual Property Rights on all information and data provided or shared by the User on the Site.
            </p>
          </div>
          <div class="tab_item tab_item_17" style="display: none;">
            <h3>OPERATIONAL HAZARDS/ COMPUTER VIRUS ATTACKS</h3>
            <p>i. SpaceKraft does not warrant in any manner whatsoever that the Site or any other software utilized by SpaceKraft for internal purposes, shall at all times remain free from any harmful components and operational hazards such as Computer Virus, worms, trojans and such related components that might be a threat to the information available with SpaceKraft.
              <br><br>
              ii. SpaceKraft shall endeavour to keep the Site secured against any possible bugs, viruses or other technical problems in compliance with the best practices of this industry.
              <br><br>
              iii. SpaceKraft shall not be held liable for any damage or injury caused due to performance, failure of performance, error, omission, interruption, deletion, defect, delay in operation or transmission, Computer Virus, link failure, site crash, malfunctioning or software/ hardware, unavailability of network, communications line failure, theft or destruction or unauthorized access to, alteration of, or use of information, whether resulting in whole or in part from negligence or otherwise.
            </p>
          </div>
          <div class="tab_item tab_item_18" style="display: none;">
            <h3>DISCLAIMER</h3>
            <p> (a) The information and opinions available on the Site in relation to the Services are mere guidelines for the purposes of providing general information on the subject and the exchange of property and any other information through or on the Site is not an offer and/or recommendation from/ by SpaceKraft.
              <br><br>
              (b) The Content should not be regarded as legal, financial or real estate advice for the User. SpaceKraft advises the User to make independent enquiries and obtain professional advice before making legal, financial or real estate decisions. The measurements, prices and locations provided on the Site are approximate and no responsibility is taken by SpaceKraft for any error, omission or misunderstanding in construing those particulars.
              <br><br>
              (c) The Services are chosen and used at the User’s risk and discretion and SpaceKraft makes no representations or warranties, express or implied, to the User in relation to the Services or otherwise regarding this Agreement, including the implied warranties of merchantability and fitness for a particular purpose.
              <br><br>
              (d) The User understands and acknowledges that the User assumes certain risks prior to interacting with other Users/ persons/ Third Party Service Providers on and through the Site, and the User shall be solely responsible for such User’s personal assessment of specific requirements with regard to interaction with other Users/ persons/ Third-Party Service Providers.
              <br><br>
              (e) SpaceKraft expressly disclaims any liability or responsibility whatsoever and howsoever arising as a result of any Content/ listing posted on the Site/ made available to SpaceKraft by any User or any third party or any deficiency in service that is caused to the User due to a Third-Party Service Provider.
              <br><br>
              (f) SpaceKraft does not warrant the Services or the results obtained from the use or that the Services will meet the User’s expectations or requirements or that the Site will be uninterrupted or free from any technical error.
              <br><br>
              (g) SpaceKraft is not responsible for the accuracy or reliability of any third-party reports, market information, studies and analysis made available on the Site and any external web links mentioned on the Site.
              <br><br>
              (h) SpaceKraft does not have the obligation to physically meet, conduct background or police verification of the Users. The terms "genuine verified owner" and "genuine verified tenants/ buyers" on the Site refer to SpaceKraft’s algorithm-based technological process by which Brokers are prohibited from accessing the Site and availing the Services. This is on a best-effort basis and has its own limitations. SpaceKraft accepts User Information in good faith and shall not be held responsible with regard to the bonafides of the Users.
              <br><br>
              (i) SpaceKraft shall not be liable for any damages, expenses, costs or losses incurring from the User’s engagement in Prohibited Conduct and availing services of Third-Party Service Providers.
              <br><br>
              (j) SpaceKraft shall not be held liable or responsible for indemnifying, refunding or reimbursing any User for any loss, damages or expenses suffered or incurred by such User as a consequence of the suspension or deactivation of the User’s Account.
              <br><br>
              (k) SpaceKraft shall not be liable for any third party fees, costs, charges or expenses incurred by the User for accessing the Site or availing the Services. SpaceKraft shall not be liable in respect of any disputes or legal proceedings between the User and such third party for any reason whatsoever and any such disputes or proceedings shall be resolved outside the Site without any reference or recourse to SpaceKraft.
              <br><br>
              (l) SpaceKraft neither has access to, nor does the Agreement govern the use of cookies or other tracking technologies that may be placed by Third Party Service Providers on the Site. These parties may permit the User to opt out of tailored advertisement at any time, however, to the extent advertising technology is integrated into the Services, the User may still receive advertisements and related updates even if they choose to opt-out of tailored advertising. SpaceKraft assumes no responsibility or liability whatsoever for the User’s receipt or use of such tailored advertisements.
              <br><br>
              (m) SpaceKraft shall not be liable for the non-performance or defective or late performance of any of the Services or any of its obligations under this Agreement to such extent and for such period of time if such non-performance, defective performance or late performance is due to acts of God, war (declared or undeclared), civil insurrection or unrest, acts (including failure to act) of any Governmental Authority, riots, revolutions, fire, floods, strikes, lock-outs or industrial action.
            </p>
          </div>
          <div class="tab_item tab_item_19" style="display: none;">
            <h3>GRANT OF RIGHTS TO SPACEKRAFT’S FINANCE PARTNERS:</h3>
            <p>i. Notwithstanding anything contained herein and in SpaceKraft's Privacy Policy, the User authorizes SpaceKraft to share with its finance partners, any and all information that the User may provide in relation to the use of the Site for availing the products and/or service of SpaceKraft’s finance partners.
              <br><br>
              ii. By clicking on the "Apply Now/Submit" tab:
              <br><br>
              (a) The User agrees and authorizes SpaceKraft’s finance partners to contact the User and communicate with the User over emails, telephonic calls, or SMS on the mobile number mentioned on the Site, or through any other communication mode, to verify the details provided by the User on the Site or to verify the information provided by the User during registration on the Site.
              <br><br>
              (b) The User confirms that the User would like to know through the above-mentioned communication modes, about the various offers and promotion schemes relating to various products/services offered by SpaceKraft’s finance partners/its group companies, from time to time.
              <br><br>
              (c) The User further agrees and confirms that the laws in relation to the unsolicited communication referred to in the "National Do Not Call Registry" (the "NDNC Registry") as laid down by the Telecom Regulatory Authority of India will not be applicable for such communication/calls/ SMS received from SpaceKraft’s finance partners, its group companies, employees, representatives and/or agents.
              <br><br>
              (d) The User authorizes SpaceKraft’s finance partners to exchange and share all information and details, as provided by the User on the Site, with third parties, including but not limited to SpaceKraft’s finance partners' group companies, service providers, financial institutions, credit bureaus, telecommunication companies, statutory bodies, etc., for customer verification, personalization of products or services, credit rating, data enrichment, marketing or promotion of services or related products of SpaceKraft’s finance partners or that of its associates and affiliates or for enforcement of the User’s obligations. In this regard, the User agrees that it shall not hold SpaceKraft’s finance partners (or any of its group companies or its/their employees/agents/representatives) liable for using/sharing of the information as stated above.
              <br><br>
              (e) The User understands and agrees that pursuant to this application form, the User will be required to submit documents to the satisfaction of SpaceKraft’s finance partners and accept the loan terms and conditions as prescribed by SpaceKraft’s finance partners in relation to the products and/or service applied by the User.
              <br><br>
              “I, as a subscriber/ User of the services offered through the web portal SpaceKraft.in, do herby expressly authorize SpaceKraft.in and any of their business associates to call/ SMS my/our registered phone numbers (as provided by me / us to SpaceKraft.in). I hereby expressly state that such authorization shall override the national Do-Not-Disturb Registry ("DND"), even if the phone numbers in question are registered under DND list of national Consumer preference registry (NCPR/NDNC). I/we also undertake that I/We will not make any complaints to NDNC for any calls received from SpaceKraft.in services/ products, and shall indemnify SpaceKraft.in and any of its business associates for having engaged in any such practice. I realize, acknowledge and expressly authorize SpaceKraft.in to make the initial communication (via Call / SMS / E-mail/WhatsApp) for the purposes of confirmation of my credentials provided by me. I hereby authorize SpaceKraft.in and its business associates to continue contacting me via any of the modes of communication listed above, till such time as I expressly opt-out / unsubscribe from the service offered by SpaceKraft.in. Till such time, SpaceKraft.in and its business associates shall have all rights to continue communicating with me and I shall completely indemnify them against any liability that may arise as a result of such authorization to communicate. Such indemnification shall extend to court cases and suits and all lawyer / advocate fees, even if the dispute is never subjected to judicial scrutiny.”
            </p>
          </div>
          <div class="tab_item tab_item_20" style="display: none;">
            <h3>LIMITATION OF LIABILITY</h3>
            <p>
              'SpaceKraft’s total aggregate liability under this Agreement and in relation to anything which SpaceKraft has done or not done in relation with this Agreement shall be limited to the fees paid by the User for availing the Services in relation to which such liability of SpaceKraft arises. ',
            </p>
          </div>
          <div class="tab_item tab_item_21" style="display: none;">
            <h3> INDEMNITY </h3>
            <p>SpaceKraft and its officers, directors, employees and agents collectively at all times shall be held indemnified against any losses, costs, expenses, claims, suits and/or damages (including reasonable attorney fees)incurred and/or suffered by SpaceKraft, whether directly or indirectly, resulting from, an act or a failure to act, of any User, person or Third-Party Service Provider for any reason whatsoever and against any claims, suits and/or legal proceedings initiated by third parties inclusive of but not limited to the User’s:
              <br><br>
              (a) breach of any terms of this Agreement;
              <br><br>
              (b) third party claims arising from an infringement or alleged infringement of such third party’s Intellectual Property;
              <br><br>
              (c) claims made by any Government Authority due to the User’s violation of Applicable Law; or
              <br><br>
              (d) actual or alleged gross negligence or willful misconduct in connection with the User’s use of the Services or this Agreement.
              <br><br>
              (e) a fraudulent act committed by a User which results in loss or damage, suffered or incurred by any other User or by any third party.
            </p>
          </div>
          <div class="tab_item tab_item_22" style="display: none;">
            <h3> USER GRIEVANCE</h3>
            <p>Any User grievance relating to the discrepancies or misuse of information so provided to SpaceKraft may be addressed to the grievance officer, whose details are provided below appointed by SpaceKraft for this purpose.
              <br><br>
              Name : Praveen Vijaysingh
              <br><br>
              Designation : Vertical Head
              <br><br>
              Email Id : info@Spacekraft.in
              <br><br>
              The grievance officer shall address the grievance within one month of the date of receipt of such grievance from the User.
            </p>
          </div>
          <div class="tab_item tab_item_23" style="display: none;">
            <h3> GUIDELINES FOR LAW ENFORCEMENT AGENCIES (LEAs)/ REPORT A FRAUD </h3>
            <p>
              The LEAs can send us the legal requests/ notices to us on info@spacekraft.in or praveen@spacekraft.in for assistance required on user details. Additionally, in case if you have any query, you can also call us on our Customer Helpline Number - 9986514442 , across all 7 days a week, between 10:00 AM to 7:00 PM. We will try to respond within 72 hours of receiving the request.
            </p>
          </div>
          <div class="tab_item tab_item_24" style="display: none;">
            <h3> WAIVER AND SEVERABILITY </h3>
            <p>
              i. No failure or delay on the part of SpaceKraft in exercising any right or remedy shall operate as a waiver of such right or remedy.
              <br><br>
              ii. In the event that any of the terms and conditions of the Agreement are declared as invalid or unenforceable by a court of competent jurisdiction, such enforceability or invalidity shall not render the other terms and conditions as invalid or unenforceable as a whole.
              <br><br>
              iii. The invalid or unenforceable provision shall be construed to reasonably reflect the actual intention of the party (in this case, SpaceKraft) while drafting it.
            </p>
          </div>
          <div class="tab_item tab_item_25" style="display: none;">
            <h3> AMENDMENT</h3>
            <p>(a) SpaceKraft shall change, update or modify this Agreement, in whole or in part, without any prior notice to the User, provided, however, that, a notification of such change, updation or modification will be made available on the Site.
              <br><br>
              (b) The User’s uninterrupted and continued usage of the Services and the Site shall be deemed as acknowledgment and acceptance of the changes, updates or modifications to the Agreement.
            </p>
          </div>
          <div class="tab_item tab_item_26" style="display: none;">
            <h3> GOVERNING LAW AND JURISDICTION</h3>
           <p>Any action, claim, dispute or difference arising out of or in connection with this Agreement, including any question regarding its existence, validity or termination (Dispute) shall be governed by and construed in accordance with the laws of India and the courts in Bengaluru shall have exclusive jurisdiction over Disputes arising out of this Agreement. Notwithstanding anything contained herein, SpaceKraft shall not be restricted or withheld from instituting proceedings in courts/ tribunals of any jurisdiction other than Bengaluru that it may in its sole discretion deem appropriate and convenient. </p>
          </div>

        </div>

      </div>
    </div>
  </div>
  <script>
    var tab_lists = document.querySelectorAll(".tabs_list ul li");
    var tab_items = document.querySelectorAll(".tab_item");

    tab_lists.forEach(function(list) {
      list.addEventListener("click", function() {
        var tab_data = list.getAttribute("data-tc");

        tab_lists.forEach(function(list) {
          list.classList.remove("active");
        });
        list.classList.add("active");

        tab_items.forEach(function(item) {
          var tab_class = item.getAttribute("class").split(" ");
          if (tab_class.includes(tab_data)) {
            item.style.display = "block";
          } else {
            item.style.display = "none";
          }

        })

      })
    })
  </script>
  <?php include 'footer.php'?>
</body>

</html>