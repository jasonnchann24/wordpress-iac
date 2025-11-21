WordPress IaC CI/CD
======================

This repository contains Infrastructure as Code (IaC) and Continuous Integration/Continuous Deployment (CI/CD) setup for deploying a WordPress site on a cloud server using Terraform, Ansible, and GitHub Actions.

## Overview
- Automated server provisioning with Terraform
- Configuration management and WordPress installation with Ansible
- CI/CD pipeline using GitHub Actions
- Traefik as a TLS termination proxy
- Dockerized WordPress setup
- Cloudflare for DNS management
- check [production/.env.example](production/.env.example) for WordPress environment variables

## Development

- use wp-env to develop locally
- ./wp-content will be merged to remote server /var/www/html/wp-content (you need to track manually to .gitignore) (refer: [github-workflow/workflows/deployments.yml:L212](github-workflow/workflows/deployments.yml#L212))

## Full Prerequisites
- A cloud provider account (e.g., Vultr) with API access
- Terraform API Token
- GitHub repository
- Cloudflare Token with DNS edit permissions
- 2 SSH key pairs needed:
    1. Ansible -> Remote Server
    2. Remote Server -> GitHub (Deploy Key)

## Environment properties needed for GitHub Actions

> Rename github-workflow/ to .github

| Property | Desc | 
|----------|----------|
HOSTNAME | Hostname for the server |
LABEL | Label for the server |
SSH_PORT | SSH Port for the server |
OS_ID | OS ID for the server, check Vultr docs (only tested with vultr and ubuntu, 2284) |
PLAN | Plan for the server, check Vultr docs (vc2-1c-1gb) |
REGION | Region for the server, check Vultr docs (sgp) |
TF_API_TOKEN | Terraform Cloud API Token, for remote state, set execution mode to local |
SSH_PORT | SSH Port for the server |
VULTR_API_KEY | Vultr API Key for Terraform to create the server |
SSH_PUB_KEY | (Pair 1) The content of the public key that Vultr to injects into the server |
VULTR_SSH_KEY_ID |  (Pair 1) THE SSH KEY ID from Vultr that Vultr injects to the initial server, (edit SSH KEY in Vultr  and check the UUID in the URL) |
SSH_PRIVATE_KEY | (Pair 1) Private key for Ansible -> Remote server, should match public keys that Vultr injects (refer: VULTR SSH KEY ID) |
DEPLOY_PRIVATE_KEY  | (Pair 2) Private key from REMOTE -> Github, key should match REPO DEPLOY PUB KEYS |
REPO_SSH_URL | The repo ssh url |
DOTENV_FILE | The full content of the .env file for WordPress setup, check production/.env.example |

---

## Local WP
1. copy production/.env.example to production/.env, and fill in your values

## Local Terraform
1. modify backend.tf if want to save state remotely, or remove for local state
2. copy terraform.tfvars.example to terraform.tfvars, and fill in your values

## Local Ansible
1. `ansible-galaxy collection install hifis.toolkit`
2. `ansible-playbook -i inventory.yml playbook.yml --extra-vars "wordpress_ip=[YOUR_SERVER_IP] private_key_path=[PATH_TO_PRIVATE_KEY_FILE] ssh_port=[SSH_PORT] deploy_key_path=[DEPLOY_PRIVATE_KEY_PATH]"`
