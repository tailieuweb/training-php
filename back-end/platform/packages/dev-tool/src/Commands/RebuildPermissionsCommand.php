<?php

namespace Botble\DevTool\Commands;

use Botble\ACL\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Console\Command;

class RebuildPermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:user:rebuild-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rebuild all the user permissions from the users defined roles and the roles defined flags';

    /**
     * @var UserInterface
     */
    protected $userRepository;

    /**
     * RebuildPermissionsCommand constructor.
     * @param UserInterface $userRepository
     */
    public function __construct(UserInterface $userRepository)
    {
        parent::__construct();

        $this->userRepository = $userRepository;
    }

    /**
     * Execute the console command.
     *
     * @throws Exception
     * @return int
     */
    public function handle()
    {
        // Safety first!
        DB::beginTransaction();

        // Firstly, lets grab out the global roles
        $allRoles = DB::select('SELECT id, name, permissions FROM roles');

        if (empty($allRoles)) {
            $users = $this->userRepository->all();
            foreach ($users as $user) {
                $user->permissions = [
                    ACL_ROLE_SUPER_USER    => (boolean)$user->super_user,
                    ACL_ROLE_MANAGE_SUPERS => (boolean)$user->manage_supers,
                ];
                $this->userRepository->createOrUpdate($user);
            }
        } else {
            // Go and grab all of the permission flags defined on these global roles
            foreach ($allRoles as $role) {

                $permissions = json_decode($role->permissions, '[]');

                $userRoles = DB::select('SELECT user_id, role_id FROM role_users WHERE role_id=' . $role->id);
                foreach ($userRoles as $userRole) {
                    $user = DB::select('SELECT super_user, manage_supers FROM users WHERE id=' . $userRole->user_id);
                    if (!empty($user)) {
                        $user = $user[0];
                        $permissions[ACL_ROLE_SUPER_USER] = (boolean)$user->super_user;
                        $permissions[ACL_ROLE_MANAGE_SUPERS] = (boolean)$user->manage_supers;
                        DB::statement("UPDATE users SET permissions = '" . json_encode($permissions) . "' where id=" . $userRole->user_id);
                    }
                }
            }
        }

        $this->info('Rebuild user permissions successfully!');

        DB::commit();

        return 0;
    }
}
