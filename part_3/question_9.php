Q9: How would you deploy an application?
A: There are multiple ways that you are able to deploy an application, these can be very dependant on what requirements the application
    may have as well at it's code base, frameworks, datastructures etc.. One method that I am familiar with is using docker containers 
    along side .yaml configuration files. 

    To deploy through this method I would initially set up my enviroment within a dockerfile.
      Specifying the initial image e.g. nginx, apache, node.
      Run any commands that would be required before building anything within my own application. e.g. RUN apt-get update -y.
      If my application then needed to be build as in the case of most node applications I would specify I directory and run
      the applications build script within that directory. 
      There may be the need to run an execution command after that followed by an EXPOSE command to determine the port it will
      be avilable on though this can be done through .yaml configuration files.

    Once the dockerfile is writen using the command docker build -t image_name:image_tag . will produce a docker image.
    That docker image can then be pushed to a private or public image repository using a command such as docker push gcr.io/image_name:tag.    
    From here one or several yaml configuration files can be writen to specify how the deployment of the image should be handled, as
    well as how it should interact with the other containers on the same server or server cluster.
    Below is an simple example of a docker-compose.yml file I've written for a previous project. Though not the finished .yaml files that 
    will be uploaded to the server. It is a fast way to configure multiple deployment and service configuration files that will later interact 
    with each other.

      
    version: '3'
    services:
      web:
        image: gcr.io/project/image_name:latest
        build: .
        ports:
          - "80:8000"
        restart: always
        environment:
          NODE_ENV: production
          PORT: 8000
          MONGO_URL: mongodb://mongo:27017/example_db
        depends_on:
          - "mongo"
        links:
          - "mongo"
      mongo:
        image: mongo:3.4.1
        ports:
          - "27017:27017"
        volumes:
          - "mongodata:/data/db"
    volumes:
      mongodata:

    Once this is complete and converted from a docker-compose.yml to it's component .yaml files. 
    Deployment can be done through the gcloud sdk with kubectl apply -f . command within the deployment folder. I'm sure
    other hosting services provide similar command line solutions however, I am unfemiliar with them at this time.
    The application should now be deployed. Further configuration with ingress, loadbalancers, automatic scaling and database sharding
    may be necesery for more complex applications however this can often be done after the initial deployment through either the 
    host provider or altering and creating further .yaml configuration files. 

