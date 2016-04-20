<?php 

use Illuminate\Database\Seeder;
use \App\Role;
use \App\Permission;
use \App\User;

class RolesAndPermissionsSeeder extends Seeder {
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('permissions')->delete();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'System Administrator'; 
        $admin->description  = 'responsible for administration of the system'; 
        $admin->save();
     
        $visitor = new Role();
        $visitor->name = 'visitor';
        $visitor->display_name = 'Site visitor'; 
        $visitor->description  = 'unregistered site visitor'; 
        $visitor->save();

        $communityManager = new Role();
        $communityManager->name = 'community_manager';
        $communityManager->display_name = 'Community Manager'; 
        $communityManager->description  = 'manage system aspects related to community'; 
        $communityManager->save();

        $challengeManager = new Role();
        $challengeManager->name = 'challenge_manager';
        $challengeManager->display_name = 'Challenge_Manager'; 
        $challengeManager->description  = 'manage system aspects related to challenges'; 
        $challengeManager->save();

        $Member = new Role();
        $Member->name = 'member';
        $Member->display_name = 'Registered user'; 
        $Member->description  = 'Registered user'; 
        $Member->save();
     
        $ViewSkillsGap = new Permission();
        $ViewSkillsGap->name = 'view-skillsgap';
        $ViewSkillsGap->display_name = 'Can view skills gap';
        $ViewSkillsGap->save();
     
        $submitSkillsGap = new Permission();
        $submitSkillsGap->name = 'submit-skillsgap';
        $submitSkillsGap->display_name = 'Can submitskillsgap';
        $submitSkillsGap->save();

        $deleteSkillsGap = new Permission();
        $deleteSkillsGap->name = 'delete-skillsgap';
        $deleteSkillsGap->display_name = 'Can delete skillsgap';
        $deleteSkillsGap->save();

        $invitePeaple = new Permission();
        $deleteSkillsGap->name = 'invite-peaple';
        $deleteSkillsGap->display_name = 'can invite peaple';
        $deleteSkillsGap->save();

        $backSkillsGap = new Permission();
        $backSkillsGap->name = 'back-skillsgap';
        $backSkillsGap->display_name = 'can back skillsgap';
        $backSkillsGap->save();

        $addComment = new Permission();
        $addComment->name = 'add-comment';
        $addComment->display_name = 'Can add comment';
        $addComment->save();

        $deleteComment = new Permission();
        $deleteComment->name = 'delete-comment';
        $deleteComment->display_name = 'can delete comment';
        $deleteComment->save();

        $shareSolution = new Permission();
        $shareSolution->name = 'share-solution';
        $shareSolution->display_name = 'can share solution on social media';
        $shareSolution->save();

        $createTag = new Permission();
        $createTag->name = 'create-tag';
        $createTag->display_name = 'can create tag';
        $createTag->save();

        $removeTag = new Permission();
        $removeTag->name = 'remove-tag';
        $removeTag->display_name = 'can remove tag';
        $removeTag->save();
     
        //add permissions to admin role
        $admin->attachPermission($ViewSkillsGap);
        $admin->attachPermission($submitSkillsGap);
        $admin->attachPermission($deleteSkillsGap);
        $admin->attachPermission($invitePeaple);
        $admin->attachPermission($backSkillsGap);
        $admin->attachPermission($addComment);
        $admin->attachPermission($deleteComment);
        $admin->attachPermission($shareSolution);
        $admin->attachPermission($createTag);
        $admin->attachPermission($removeTag);
        //assign permissions to site visitor role
        $visitor->attachPermission($ViewSkillsGap);
        $visitor->attachPermission($submitSkillsGap);
        $visitor->attachPermission($shareSolution);
        $visitor->attachPermission($createTag);
        $visitor->attachPermission($removeTag);
        //assign permissions to community manager role
        $communityManager->attachPermission($ViewSkillsGap);
        $communityManager->attachPermission($submitSkillsGap);
        $communityManager->attachPermission($shareSolution);
        $communityManager->attachPermission($createTag);
        $communityManager->attachPermission($removeTag);
        //assign permissions to community manager role
        $challengeManager->attachPermission($ViewSkillsGap);
        $challengeManager->attachPermission($submitSkillsGap);
        $challengeManager->attachPermission($shareSolution);
        $challengeManager->attachPermission($createTag);
        $challengeManager->attachPermission($removeTag);
        //add permissions to member role
        $Member->attachPermission($ViewSkillsGap);
        $Member->attachPermission($submitSkillsGap);
        $Member->attachPermission($deleteSkillsGap);
        $Member->attachPermission($invitePeaple);
        $Member->attachPermission($backSkillsGap);
        $Member->attachPermission($addComment);
        $Member->attachPermission($deleteComment);
        $Member->attachPermission($shareSolution);
        $Member->attachPermission($createTag);
        $Member->attachPermission($removeTag);


        $adminRole = DB::table('roles')->where('name', '=', 'Admin')->pluck('id');
        $visitorRole = DB::table('roles')->where('name', '=', 'Visitor')->pluck('id');
        // print_r($userRole);
        // die();
     
        $user1 = User::where('email','=','myself@mail.com')->first();
        $user1->roles()->attach($adminRole);
        $user2 = User::where('email','=','myself2@mail.com')->first();
        $user2->roles()->attach($visitorRole);
    }
}