# Shiptracker started

#  =================== WORK AVANCEMENT ===================
            ⚠️ - ❌ - ⭕️ - 💯 - 🔘 - ✅

- Main Func
    + Generate and save UPC_A / UPC_E barcode
        * state ✅: working 
        * to improve 🔘: 
            * 12 digits code generation ✅, 
            * well text formatting under code bar image 🔘

    + send mail notification
        * state ✅: working,
            * sending mail ✅
            * queue driver set to database for mail auto scheduling ✅
        * to do after 🔘: 
            * add server mail domain and update .env credential to use true email and bulk sending ✅
            * set cron task to deliver mail in async way in web hosting ⚠️
        * idea: cron job to send notification to all users about their ship status, with bulk message ⭕️
            * could be not good: nb mail = nb user each day

    + Business Services Client: 
        * estimate shipping cost ✅
        * order a new shippings: packages infos, sender, receiver ✅
            * shipping with null on (last checked point, departure, arrival, reference_exp, codebarurl)
            * shipping init: sender, receiver, packages, status_exp, user_id, reference_exp
        * ship tracking: what to display ✅
            * status: 1-ORDERED | 2-DEPOSITED | 3-ON WAY | 4-ARRIVED | 5-DELIVERED
            * ship infos: barcode, departure, last checked referal point, each package description
        * shipping history: ✅
            * all shippings with details (departure, arrival, status, number of package, total weight)
        * Alert Preference management ✅
            * create and update default configuration

    + Admin shipping actions:
        * launch shipping ✅
            * set shipping route and actual referal point on shipping
            * set departure, status, codebar url
        * update shipping (status, actual point) ✅

    + User actions 
        * singup, signin, auth middleware ✅
        * mail verification, signout ⚠️

    + Template integration
        * controller input validation and error management
        * change some images and colors
        * inspirations: form input fields style, form with sections, calculateur


- Notes:
    * when deploying check that exif and gd extension are enabled on server ⚠️ ⚠️ ⚠️
    * Users:
        * implement user email verification for further alert services
        * identify users with email and telephone (for alert services)
    * Actually (may change later) : we didnt use relationship between shipping and route because of many to many complexity.
        * how to deal with: on shipping creation add routeuuid on shipping and along the course update actual point uuid based on route uuid
    * when sending data through api like 
        * use sethidden, setvisible toarray tojson
    


    
- Model Understanding 
    <!-- Route, Point, Shipping: something simple -->
    * we create a route with : name, set of point(array of object(id,name))
    * a shipping is associated with a route and has: actual point which is an integer
    * a shipping is nullable on date 
    * implies that for each new shipping we create a custom route or reuse and old 
    * each user has his own shippings 

- UI inspiration vertical menu items
    * Expedition Cost estimator
    * Expeditions: 3 tabs
        * new expedition
        * History -> expedition detail
    * User settings: 2 tabs
        * user informations with update forms
        * user preferences
    
- UI Nucleo icons
