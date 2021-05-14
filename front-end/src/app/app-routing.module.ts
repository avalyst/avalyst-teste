import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { ContactListComponent } from './components/contact-list/contact-list.component';
import { ContactCreateComponent } from './components/contact-create/contact-create.component';

const routes: Routes = [
  { path: '', redirectTo: '/contatos', pathMatch: 'full' },
  { path: 'contatos/incluir', component: ContactCreateComponent },
  { path: 'contatos', component: ContactListComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
