pipeline{
    agent any
    environment{

    }

    stages{
        stage('Git checkout'){
            steps{
                checkout scm
            }
        }

        stage('Building image'){
            steps{
                script{
                    webapp = docker.build("ranjarat/webapp:0.${env.BUILD_ID}")
                }
            }
        }

        stage('Pushing image'){
            steps{
                script{
                    docker.withRegistry('https://registry.hub.docker.com', 'hub'){
                        webapp.push("latest")
                        webapp.push("${env.BUILD_ID}")
                    }
                }
            }
        }
    }
}
