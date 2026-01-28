import { Injectable } from '@nestjs/common';
import { RabbitSubscribe } from '@golevelup/nestjs-rabbitmq';

@Injectable()
export class AppService {
  private tasks: any[] = [];

  constructor() {
    console.log('✅ AppService (TASK SERVICE) LOADED');
  }

  @RabbitSubscribe({
    exchange: 'user-exchange',
    routingKey: 'user.created',
    queue: 'task-service-user-created',
  })
  handleUserCreated(msg: any) {
    console.log('🔥 EVENT DITERIMA DI TASK SERVICE:', msg);

    this.tasks.push({
      id: Date.now(),
      title: 'Welcome Task',
      deadline: null,
      status: 'pending',
    });
  }

  getTasks() {
    return this.tasks;
  }

  createTask(task: any) {
    const newTask = {
      id: Date.now(),
      title: task.title,
      deadline: task.deadline,
      status: 'pending',
    };
    this.tasks.push(newTask);
    return newTask;
  }

  deleteTask(id: number) {
    this.tasks = this.tasks.filter((t) => t.id !== id);
    return { message: 'deleted' };
  }
}
