pipeline {
    agent any

    environment {
        REPO_URL = 'https://github.com/Kumpatlapavankumar/jenkins-project.git'
        CLONE_DIR = 'php-docker-stack-demo2'
    }

    stages {
        stage('Clone Repository') {
            steps {
                script {
                    sh "git clone ${REPO_URL} ${CLONE_DIR}"
                }
            }
        }

        stage('Run Docker Compose') {
            steps {
                dir("${CLONE_DIR}") {
                    script {
                        sh 'docker-compose up --build -d'
                    }
                }
            }
        }

        stage('Check Docker Logs') {
            steps {
                dir("${CLONE_DIR}") {
                    script {
                        sh 'docker-compose logs -f'
                    }
                }
            }
        }
    }

    post {
        success {
            echo '✅ App deployed successfully.'
        }
        failure {
            echo '❌ Deployment failed.'
        }
    }
}
