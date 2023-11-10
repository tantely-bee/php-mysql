pipeline{
    agent any
    environment{
        PROJECT_ID = 'boxwood-destiny-401815'
        CLUSTER_NAME = 'cluster'
        LOCATION = 'us-central1-a'
        CREDENTIALS_ID = '89d535d3-12ce-47ba-9d62-cd51c2ea692f'
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
                        webapp.push("1.${env.BUILD_ID}")
                    }
                }
            }
        }

         stage('Deploy to GKE'){
            steps{
                sh "sed -i 's/webapp:latest/webapp:0.${env.BUILD_ID}/g' deployment.yaml"
                step([$class: 'KubernetesEngineBuilder', projectId: env.PROJECT_ID, clusterName: env.CLUSTER_NAME, location: env.LOCATION, manifestPattern: 'deployment.yaml', credentialsId: env.CREDENTIALS_ID, verifyDeployments: true])
                sh 'gcloud auth login --quiet --cred-file=/home/tatelrazafimahefa/test.json'
                sh 'gcloud container clusters get-credentials cluster --zone us-central1-a --project boxwood-destiny-401815'
                sh 'kubectl set image deployment webapp webapp=ranjarat/webapp:latest'
            }
        }
    }
}
