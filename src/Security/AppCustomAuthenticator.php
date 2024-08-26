<?php

namespace App\Security;

use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class AppCustomAuthenticator extends AbstractAuthenticator
{
    public function supports(Request $request): bool
    {
        // This checks if the request is for the login page
        return $request->attributes->get('_route') === 'login' && $request->isMethod('POST');
    }

    public function authenticate(Request $request): Passport
    {
        $username = $request->request->get('_username');
        $password = $request->request->get('_password');

        // Check if username and password exist
        if (!$username || !$password) {
            throw new CustomUserMessageAuthenticationException('Username and password must be provided');
        }

        // Return a Passport containing the UserBadge and PasswordCredentials
        return new Passport(
            new UserBadge($username),
            new PasswordCredentials($password)
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): Response
    {
        // Redirect the user to the admin page on successful login
        return new RedirectResponse('/admin');
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        // Redirect to login with error message
        return new RedirectResponse('/login');
    }
}